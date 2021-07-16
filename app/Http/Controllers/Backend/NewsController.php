<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsReactEmoji;
use Illuminate\Support\Facades\Auth;
use App\Models\NewsCategory;
use App\Models\Trend;
use Yajra\Datatables\Datatables;
use Image;
use File;

class NewsController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}

	public function index(Request $request)
	{
		// $news = News::with('categories')->orderBy('created_at', 'DESC')->get();
		// dd($news);
		if ($request->ajax()) {
			$news = News::query();

			return Datatables::of($news)
				->editColumn('title', '{{ Str::words($title, 10) }}')
				->addColumn('category', function (News $news) {

					$categories = '';
					$countCategory = $news->categories->count();
					for ($i = 0; $i < $countCategory; $i++) {
						if ($i != ($countCategory - 1)) {
							$categories .= $news->categories[$i]->title_np . ', ';
						} else {
							$categories .= $news->categories[$i]->title_np;
						}
					}
					return $categories;
				})
				->editColumn('status', '{!! ($status==1)? "<button class=\"btn btn-success btn-sm\">Published</button>" : "<button class=\"btn btn-danger btn-sm\">Unpublished</button>" !!}')
				->editColumn('image', '<img src="{{ asset(\'images/news/low-quality/\'. $image) }}" width="100px">')
				->editColumn('action', function ($data) {

					$authRoles = Auth::user()->roles;
					foreach ($authRoles as $role)
						$roles[] = $role->name;

					$btn = '<a href="' . route('backend.news.edit', $data->id) . '" class="btn btn-primary btn-sm mr-5 edit" title="Edit">Edit</a>';

					if (in_array('admin', $roles)) {
						$btn .= '<a href="#" class="btn btn-danger btn-sm delete" title="Delete" data-newsid="' . $data->id . '" data-toggle="modal" data-target="#delete">Delete</a>';
					}

					return $btn;
				})
				->rawColumns(['image', 'status', 'action'])
				->editColumn('published_date', '{{ getNpDateMonthYear($published_date).\' \'.convertToNepaliNumber(date(\'H:i:s\', strtotime($published_date))) }}')
				->addIndexColumn()
				->make(true);
		}

		return view('backend.news.index');
	}

	public function create()
	{
		$images = File::allFiles(public_path('images/news/low-quality/'));
		$authors = Author::where('status', 1)->orderBy('order', 'ASC')->get();
		$trends = Trend::asc()->get();
		$categories = Category::with('subCategories')->where('parent_id', null)->where('status', 1)->orderBy('list_order', 'ASC')->get();
		return view('backend.news.create', compact('images', 'authors', 'categories', 'trends'));
	}

	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required',
			'catOrSubCat.*' => 'required',
			'shortDescription' => 'required',
			'description' => 'required',
			'author' => 'required|numeric',
		]);

		try {
			$news = new News();
			$news->title = $request['title'];
			$news->caption = $request['shortDescription'];
			$news->description = $request['description'];
			$news->author_id = $request['author'];

			if (!empty($request['featuredNews'])) {
				$news->featured_news = $request['featuredNews'];
			} else {
				$news->featured_news = 0;
			}

			if (!empty($request['videoId'])) {
				$news->video_link = $request['videoId'];
			}


			if (!empty($request['mediaImage'])) {
				$news->image = $request['mediaImage'];
			}

			if ($request->hasFile('fileImage')) {
				$news->image = $this->imageUpload($request, 'fileImage', public_path() . '/images/news/');
			}

			if (!is_null($request['publishDate']) && !is_null($request['publishTime'])) {
				$news->published_date = $request['publishDate'] . ' ' . $request['publishTime'];
			} else if (!is_null($request['publishDate']) && is_null($request['publishTime'])) {
				$news->published_date = $request['publishDate'] . ' ' . date('H:i:s');
			} else if (is_null($request['publishDate']) && !is_null($request['publishTime'])) {
				$news->published_date = date('Y-m-d') . ' ' . $request['publishTime'];
			} else if (is_null($request['publishDate']) && is_null($request['publishTime'])) {
				$news->published_date = date('Y-m-d') . ' ' . date('H:i:s');
			}

			if (!empty($request['topNews'])) {
				$news->top_news = $request['topNews'];
				$news->show_image = $request['showImage'];
			} else {
				$news->top_news = 0;
			}

			if (!is_null($request['status'])) {
				$news->status = $request['status'];
			}

			if (!is_null($request['highlightedNews'])) {
				$news->highlighted_news = $request['highlightedNews'];
			}

			$news->meta_keyword = $request['seoKeyword'];
			$news->meta_title = $request['seoTitle'];
			$news->meta_description = $request['seoDescription'];
			$news->save();

			// for trend
			if (!empty($request['trend'])) {
				$trends = $request->trend;
				$news->trends()->attach($trends);
			}

			if (!empty($request['categoryOrSubcategory'])) {
				foreach ($request['categoryOrSubcategory'] as $catOrSubCat) {
					$newsCategory = new NewsCategory();
					$newsCategory->category_id = $catOrSubCat;
					$newsCategory->news_id = $news->id;
					$newsCategory->save();
				}
			}

			$newsReactEmoji = new NewsReactEmoji();
			$newsReactEmoji->news_id = $news->id;
			$newsReactEmoji->save();
		} catch (\Exception $e) {
			$request->session()->flash('successMessage', 'Failed to add news !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'News added successfully !!!');
		return redirect()->route('backend.news.index');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$editCatOrSubCatIds = array();
		$editrend = array();
		$editNews = News::with('categories', 'trends')->where('id', $id)->first();
		$images = File::allFiles(public_path('images/news/low-quality/'));
		$authors = Author::where('status', 1)->orderBy('order', 'ASC')->get();
		$trends = Trend::asc()->get();


		foreach ($editNews->categories as $catOrSubCat) {
			$editCatOrSubCatIds[] = $catOrSubCat->id;
		}
		foreach ($editNews->trends as $trend) {
			$editrend[] = $trend->id;
		}

		// dd($editNews->trends);
		$categories = Category::with('subCategories')->where('parent_id', null)->where('status', 1)->orderBy('list_order', 'ASC')->get();
		return view('backend.news.edit', compact('editNews', 'categories', 'images', 'authors', 'editCatOrSubCatIds', 'trends', 'editrend'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'title' => 'required',
			'catOrSubCat.*' => 'required',
			'shortDescription' => 'required',
			'description' => 'required',
			'author' => 'required|numeric',
		]);

		try {
			$news = News::where('id', $id)->first();
			$news->title = $request['title'];
			$news->caption = $request['shortDescription'];
			$news->description = $request['description'];
			$news->author_id = $request['author'];
			$news->video_link = $request['videoId'];

			if (!empty($request['featuredNews'])) {
				$news->featured_news = $request['featuredNews'];
			} else {
				$news->featured_news = 0;
			}

			if (!is_null($request['mediaImage'])) {
				$news->image = $request['mediaImage'];
			}

			if ($request->hasFile('fileImage')) {
				$news->image = $this->imageUpload($request, 'fileImage', public_path() . '/images/news/');
			}

			if (!is_null($request['publishDate']) && !is_null($request['publishTime'])) {
				$news->published_date = $request['publishDate'] . ' ' . $request['publishTime'];
			} else if (!is_null($request['publishDate']) && is_null($request['publishTime'])) {
				$news->published_date = $request['publishDate'] . ' ' . date('H:i:s');
			} else if (is_null($request['publishDate']) && !is_null($request['publishTime'])) {
				$news->published_date = date('Y-m-d') . ' ' . $request['publishTime'];
			} else if (is_null($request['publishDate']) && is_null($request['publishTime'])) {
				$news->published_date = date('Y-m-d') . ' ' . date('H:i:s');
			}

			if (!empty($request['topNews'])) {
				$news->top_news = $request['topNews'];
				$news->show_image = $request['showImage'];
			} else {
				$news->top_news = 0;
				$news->show_image = 0;
			}

			if (!empty($request['status'])) {
				$news->status = $request['status'];
			} else {
				$news->status = 0;
			}

			if (!is_null($request['highlightedNews'])) {
				$news->highlighted_news = $request['highlightedNews'];
			}

			$news->meta_keyword = $request['seoKeyword'];
			$news->meta_title = $request['seoTitle'];
			$news->meta_description = $request['seoDescription'];
			$news->update();

			// for trend
			if (!empty($request['trend'])) {
				$trends = $request->trend;
				$news->trends()->sync($trends);
			}

			NewsCategory::where('news_id', $news->id)->delete();
			if (!empty($request['categoryOrSubcategory'])) {
				foreach ($request['categoryOrSubcategory'] as $catOrSubCat) {
					$newsCategory = new NewsCategory();
					$newsCategory->category_id = $catOrSubCat;
					$newsCategory->news_id = $news->id;
					$newsCategory->save();
				}
			}
		} catch (\Exception $e) {
			$request->session()->flash('successMessage', 'Failed to update news !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'News updated successfully !!!');
		return redirect()->route('backend.news.index');
	}

	public function destroy(Request $request, $id)
	{
		if ($request->ajax()) {
			try {
				$news = News::where('id', $id)->firstOrFail();
				$news->trends()->detach();
				$news->delete();

				NewsCategory::where('news_id', $id)->delete();
			} catch (\Exception $e) {
				return response()->json(['status' => 'Failed to delete news !!!']);
			}

			return response()->json(['status' => 'News deleted successfully !!!']);
		}
	}

	public function imageUpload($request, $formImageName, $path)
	{
		if ($request->hasFile($formImageName)) {
			$image = $request->file($formImageName);
			$imageName = $image->getClientOriginalName();
			$uniqueName = time() . '-' . $imageName;
			$image->move($path, $uniqueName);

			Image::make(public_path('/images/news/' . $uniqueName))->resize(555, null, function ($constraint) {
				$constraint->aspectRatio();
			})->save(public_path('/images/news/high-quality/' . $uniqueName));

			Image::make(public_path('/images/news/' . $uniqueName))->resize(360, null, function ($constraint) {
				$constraint->aspectRatio();
			})->save(public_path('/images/news/medium-quality/' . $uniqueName));

			Image::make(public_path('/images/news/' . $uniqueName))->resize(130, null, function ($constraint) {
				$constraint->aspectRatio();
			})->save(public_path('/images/news/low-quality/' . $uniqueName));

			return $uniqueName;
		}
	}
}
