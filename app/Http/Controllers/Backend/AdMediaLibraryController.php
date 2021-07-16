<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;

class AdMediaLibraryController extends Controller
{
  public function __construct()
	{
		return $this->middleware('auth');
	}
	
	public function index()
	{
		$images = File::allFiles(public_path('images/advertisement'));
		return View('backend.ad-media-library.index')->with(array('images' => $images));
	}

	public function create()
	{
		return view('backend.ad-media-library.create');
	}

	public function store(Request $request)
	{
		try {		
			if ($request->hasFile('image')) {
				$images = $request->file('image');
				foreach ($images as $file) {
					$imageName = $file->getClientOriginalName();
					$uniqueName = time() . '-' . $imageName;
					$file->move(public_path() . '/images/advertisement/', $uniqueName);
				}
			}
		} 
		catch (\Exception $e) {
			$request->session()->flash('unsuccessMessage', 'Failed to upload images.');
			return redirect()->back();
		}

		return redirect()->route('backend.ad-media-library.index')->with('successMessage', ' Image Uploaded');
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
					File::delete(public_path('/images/advertisement/'). $image);
			}
		} catch (\Exception $e) {
			$request->session()->flash('unsuccessMessage', 'Failed to Delete');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Deleted Successfully');
		return redirect()->back();
	}
}
