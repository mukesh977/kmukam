<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class CKEditorController extends Controller
{
	public function uploadImage(Request $request)
	{
		if ($request->hasFile('upload')) {
			$image = $request->file('upload');
			$imageName = $image->getClientOriginalName();
			$uniqueName = time() . '-' . $imageName;
			$image->move(public_path('/images/news/'), $uniqueName);

			Image::make(public_path('/images/news/'. $uniqueName))->resize(555, null, function($constraint){
				$constraint->aspectRatio();
			})->save(public_path('/images/news/high-quality/'. $uniqueName));

			Image::make(public_path('/images/news/'. $uniqueName))->resize(360, null, function($constraint){
				$constraint->aspectRatio();
			})->save(public_path('/images/news/medium-quality/'. $uniqueName));

			Image::make(public_path('/images/news/'. $uniqueName))->resize(130, null, function($constraint){
				$constraint->aspectRatio();
			})->save(public_path('/images/news/low-quality/'. $uniqueName));

			$CKEditorFuncNum = $request->input('CKEditorFuncNum');
			$url = asset('images/news/'.$uniqueName);
			$msg = 'Image uploaded successfully'; 
			$response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

			@header('Content-type: text/html; charset=utf-8'); 
			echo $response;

		}
	}
}
