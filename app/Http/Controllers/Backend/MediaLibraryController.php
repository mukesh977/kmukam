<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use File;

class MediaLibraryController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}
	
	public function index()
	{
		$images = File::allFiles(public_path('images/news/low-quality'));
		return View('backend.mediaLibrary.index')->with(array('images' => $images));
	}

	public function create()
	{
		return view('backend.mediaLibrary.create');
	}

	public function store(Request $request)
	{
		try {		
			if ($request->hasFile('image')) {
				$images = $request->file('image');
				foreach ($images as $file) {
					$imageName = $file->getClientOriginalName();
					$uniqueName = time() . '-' . $imageName;
					$file->move(public_path() . '/images/news/', $uniqueName);

					Image::make(public_path('/images/news/'. $uniqueName))->resize(555, null, function($constraint){
						$constraint->aspectRatio();
					})->save(public_path('/images/news/high-quality/'. $uniqueName));

					Image::make(public_path('/images/news/'. $uniqueName))->resize(360, null, function($constraint){
						$constraint->aspectRatio();
					})->save(public_path('/images/news/medium-quality/'. $uniqueName));

					Image::make(public_path('/images/news/'. $uniqueName))->resize(130, null, function($constraint){
						$constraint->aspectRatio();
					})->save(public_path('/images/news/low-quality/'. $uniqueName));
				}
			}
		} 
		catch (\Exception $e) {
			$request->session()->flash('unsuccessMessage', 'Failed to upload images.');
			return redirect()->back();
		}

		return redirect()->route('backend.media-library.index')->with('successMessage', ' Image Uploaded');
	}

	public function show($id)
	{
			//
	}

	public function edit($id)
	{
			//
	}

	public function update(Request $request, $id)
	{
			//
	}

	public function destroy($id)
	{
			//
	}

	public function bulkDestroy(Request $request)
	{
		try {
			$images = $request->images;
			foreach ($images as $image) {
					File::delete(public_path('/images/news/'). $image);
					File::delete(public_path('/images/news/high-quality/'). $image);
					File::delete(public_path('/images/news/medium-quality/'). $image);
					File::delete(public_path('/images/news/low-quality/'). $image);
			}
		} catch (\Exception $e) {
			$request->session()->flash('unsuccessMessage', 'Failed to Delete');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Deleted Successfully');
		return redirect()->back();
	}
	
	public function search(Request $request)
	{
		$resultImages = array();
		$keywords = $request['keywords'];
		$arrayKeywords = explode(" ", $keywords);
		$images = File::allFiles(public_path('images/news/low-quality'));

		foreach ($images as $image){
			$imageName = $image->getFilename();
			foreach ($arrayKeywords as $k){
				if (preg_match("/$k/i", $imageName)){
					$resultImages[] = $imageName;
					break;
				}
			}
		}

		return response()->json($resultImages);
	}
	
	public function showImages()
	{
		$imgs = File::allFiles(public_path('images/news/low-quality'));

		$images = array();
		foreach ($imgs as $image){
			$images[] = $image->getFilename();
		}
		
		return response()->json($images);
	}
}
