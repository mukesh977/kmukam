<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}

	public function index()
	{
		$categories = Category::with(['subCategories' => function($query){
										$query->orderBy('list_order', 'ASC');
									}])->where('parent_id', null)->orderBy('list_order', 'ASC')->paginate(24);
		return view('backend.category.index', compact('categories'));
	}

	public function create()
	{
		$categories = Category::where('parent_id', null)
													->where('status', 1)
													->orderBy('list_order', 'DESC')
													->get();

		return view('backend.category.create', compact('categories'));
	}

	public function store(Request $request)
	{
		$request->validate([
			'nepaliTitle' => 'required',
			'englishTitle' => 'required|unique:categories,title_en',
			'category' => 'required',
		]);

		try{
			$category = new Category();
			$category->title_np = $request['nepaliTitle'];
			$category->title_en = $request['englishTitle'];

			if ($request['category']!=0){
				$category->parent_id = $request['category'];
			}

			$slug = Str::slug($request['englishTitle']);
			$category->slug = $slug;

			if (!empty($request['order'])){
				$category->list_order = $request['order'];
			}
			else{
				$lastRecord = Category::orderBy('created_at', 'DESC')->first();
				if (!empty($lastRecord))
					$category->list_order = $lastRecord->id + 1;
				else
					$category->list_order = 1;
			}


			$category->status = !empty($request['status'])? $request['status'] : '1';
			$category->meta_keyword = $request['seoKeyword'];
			$category->meta_title = $request['seoTitle'];
			$category->meta_description = $request['seoDescription'];
			$category->save();
		}
		catch (\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to create category !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Category added successfully !!!');
		return redirect()->route('backend.category.index');
	}

	public function show($id)
	{
			//
	}

	public function edit($id)
	{
		$editCategory = Category::where('id', $id)->first();
		$categories = Category::where('parent_id', null)
								->where('id', '!=', $id)
								->where('status', 1)
								->orderBy('list_order', 'DESC')
								->get();
													
		return view('backend.category.edit', compact('editCategory', 'categories'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'nepaliTitle' => 'required',
			'englishTitle' => 'required|unique:categories,title_en,'. $id,
			'category' => 'required',
		]);

		try{
			$category = Category::where('id', $id)->first();
			$category->title_np = $request['nepaliTitle'];
			$category->title_en = $request['englishTitle'];

			if ($request['category']!=0){
				$category->parent_id = $request['category'];
			}

			if (!empty($request['order'])){
				$category->list_order = $request['order'];
			}
			else{
				$lastRecord = Category::orderBy('created_at', 'DESC')->first();
				if (!empty($lastRecord))
					$category->list_order = $lastRecord->id + 1;
				else
					$category->list_order = 1;
			}

			$category->status = $request['status'];
			$category->meta_keyword = $request['seoKeyword'];
			$category->meta_title = $request['seoTitle'];
			$category->meta_description = $request['seoDescription'];
			$category->update();
		}
		catch (\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to update category !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Category updated successfully !!!');
		return redirect()->route('backend.category.index');
	}

	public function destroy($id, Request $request)
	{
		if ($request->ajax()){
			try{
				Category::where('id', $id)->delete();
			}
			catch (\Exception $e){
				return response()->json(['status' => 'Failed to delete category !!!']);
			}

			return response()->json(['status' => 'Category deleted successfully !!!']);
		}
	}
}
