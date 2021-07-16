<?php

namespace App\Http\Controllers\Backend\Seo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;

class SeoController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}

	public function getHomePageSeo()
	{
		$seo = Seo::where('section', '=', 'homepage-seo')->first();
		return view('backend.seo.homepage-seo.homepage-seo', compact('seo'));
	}

	public function setHomePageSeo(Request $request)
	{
		try
    {
	    $seo = Seo::where('section', '=', 'homepage-seo')->first();

	    if( $seo == null )
	    {
	    	$seo = new Seo();
		    $seo->section = 'homepage-seo';
		    $seo->meta_keyword = $request['seoKeyword'];
		    $seo->meta_title = $request['seoTitle'];
		    $seo->meta_description = $request['seoDescription'];

		    $seo->title = $request['title'];
		    $seo->description = $request['description'];
		    
		    if ($request->hasFile('image')){
					$image = $request->file('image');
					$imageName = $image->getClientOriginalName();
					$uniqueName = time() . '-' . $imageName;
					$image->move(public_path(). '/images/seo', $uniqueName);
					$seo->image = $uniqueName;
		    }

		    $seo->save();
	    }
	    else
	    {
	    	$seo->meta_keyword = $request['seoKeyword'];
		    $seo->meta_title = $request['seoTitle'];
		    $seo->meta_description = $request['seoDescription'];

		    $seo->title = $request['title'];
		    $seo->description = $request['description'];
		    
		    if ($request->hasFile('image')){
					\File::delete('images/seo/'. $seo->image);
					$image = $request->file('image');
					$imageName = $image->getClientOriginalName();
					$uniqueName = time() . '-' . $imageName;
					$image->move(public_path(). '/images/seo', $uniqueName);
					$seo->image = $uniqueName;
		    }

		    $seo->update();
	    }
	 	}
	 	catch(\Exception $e)
	 	{
	 		request()->session()->flash('unsuccessMessage', 'Failed to update !!!');
	    return redirect()->back();	
	 	}

	 	request()->session()->flash('successMessage', 'Updated successfully !!!');
    return redirect()->back(); 
  }
}
