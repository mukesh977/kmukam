<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use File;

class AdvertisementHomeController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}

	public function index(Request $request)
	{
		if($request->ajax())
    {
      $advertisements = Advertisement::where('section', 'home')->get();

			return Datatables::of($advertisements)
							->editColumn('title', '{{ Str::words($title, 10) }}')
							->editColumn('image', '{!! !empty($image)? \'<img src="\'. asset(\'images/advertisement/\'. $image) .\'" height="50px" width="50px" style="object-fit: cover;">\' : \'\' !!}')
							->editColumn('image_2', '{!! ($double_ad==1)? (!empty($image_2)? \'<img src="\'. asset(\'images/advertisement/\'. $image_2) .\'" height="50px" width="50px" style="object-fit: cover;">\' : \'\') : \'Disabled\' !!}')
              ->editColumn('publish_date_2', '{{ ($double_ad == 1)? $publish_date_2 : \'Disabled\' }}')
							->editColumn('end_date_2', '{{ ($double_ad == 1)? $end_date_2 : \'Disabled\' }}')
							->editColumn('action', function($data){
                
                $authRoles = Auth::user()->roles;
                foreach( $authRoles as $role)
                  $roles[] = $role->name;

                $btn = '<a href="'. route('backend.home-advertisement.edit', $data->id) .'" class="btn btn-primary btn-sm mr-5 edit" title="Edit">Edit</a>';

                if(in_array('admin', $roles)){
                  $btn .= '<a href="#" class="btn btn-danger btn-sm delete" title="Delete" data-advertisementid="'. $data->id .'" data-toggle="modal" data-target="#delete">Delete</a>';
                }
                
                return $btn;
              })
              ->rawColumns(['image', 'image_2', 'action'])
							->addIndexColumn()
              ->make(true);
		}
		
		return view('backend.advertisement.advertisement-home.index');
	}

	public function edit($id)
	{
		$editHomeAd = Advertisement::where('id', $id)->where('section', 'home')->first();
		$images = File::allFiles(public_path('images/advertisement/'));
		return view('backend.advertisement.advertisement-home.edit', compact('editHomeAd', 'images'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'title' => 'required',
			'link1' => 'required',
			'status1' => 'required',
		]);

		try{
			$homeAd = Advertisement::where('id', $id)->where('section', 'home')->first();
			$homeAd->title = $request['title'];
			$homeAd->link = $request['link1'];

			//for publish date and time
			if (!is_null($request['publishDate1']) && !is_null($request['publishTime1'])){
				$homeAd->publish_date = date('Y-m-d', strtotime($request['publishDate1'])).' '. date('H:i:s', strtotime($request['publishTime1']));
			}
			else if (!is_null($request['publishDate1']) && is_null($request['publishTime1'])){
				$homeAd->publish_date = date('Y-m-d', strtotime($request['publishDate1'])).' '. date('H:i:s');
			}
			else if (is_null($request['publishDate1']) && !is_null($request['publishTime1'])){
				$homeAd->publish_date = date('Y-m-d').' '. date('H:i:s', strtotime($request['publishTime1']));
			}
			else if (is_null($request['publishDate1']) && is_null($request['publishTime1'])){
				$homeAd->publish_date = date('Y-m-d').' '. date('H:i:s');
			}

			//for end date and time
			if (!is_null($request['endDate1']) && !is_null($request['endTime1'])){
				$homeAd->end_date = date('Y-m-d', strtotime($request['endDate1'])).' '. date('H:i:s', strtotime($request['endTime1']));
			}
			else if (!is_null($request['endDate1']) && is_null($request['endTime1'])){
				$homeAd->end_date = date('Y-m-d', strtotime($request['endDate'])).' '. date('H:i:s');
			}
			else if (is_null($request['endDate1']) && !is_null($request['endTime1'])){
				$homeAd->end_date = date('Y-m-d').' '. date('H:i:s', strtotime($request['endTime']));
			}
			else if (is_null($request['endDate1']) && is_null($request['endTime1'])){
				$homeAd->end_date = date('Y-m-d').' '. date('H:i:s');
			}

			if (!is_null($request['status1'])){
				$homeAd->status = $request['status1'];
			}

			//upload for image
			if (!empty($request['mediaImage'])){
				$homeAd->image = $request['mediaImage'];
			}
	
			if ($request->hasFile('fileImage')){
				$homeAd->image = $this->imageUpload($request, 'fileImage', public_path().'/images/advertisement/');
			}



			$homeAd->link_2 = $request['link2'];

			//for publish date and time
			if (!is_null($request['publishDate2']) && !is_null($request['publishTime2'])){
				$homeAd->publish_date_2 = date('Y-m-d', strtotime($request['publishDate2'])).' '. date('H:i:s', strtotime($request['publishTime2']));
			}
			else if (!is_null($request['publishDate2']) && is_null($request['publishTime2'])){
				$homeAd->publish_date_2 = date('Y-m-d', strtotime($request['publishDate2'])).' '. date('H:i:s');
			}
			else if (is_null($request['publishDate2']) && !is_null($request['publishTime2'])){
				$homeAd->publish_date_2 = date('Y-m-d').' '. date('H:i:s', strtotime($request['publishTime2']));
			}
			else if (is_null($request['publishDate2']) && is_null($request['publishTime2'])){
				$homeAd->publish_date_2 = date('Y-m-d').' '. date('H:i:s');
			}

			//for end date and time
			if (!is_null($request['endDate2']) && !is_null($request['endTime2'])){
				$homeAd->end_date_2 = date('Y-m-d', strtotime($request['endDate2'])).' '. date('H:i:s', strtotime($request['endTime2']));
			}
			else if (!is_null($request['endDate2']) && is_null($request['endTime2'])){
				$homeAd->end_date_2 = date('Y-m-d', strtotime($request['endDate2'])).' '. date('H:i:s');
			}
			else if (is_null($request['endDate2']) && !is_null($request['endTime2'])){
				$homeAd->end_date_2 = date('Y-m-d').' '. date('H:i:s', strtotime($request['endTime2']));
			}
			else if (is_null($request['endDate2']) && is_null($request['endTime2'])){
				$homeAd->end_date_2 = date('Y-m-d').' '. date('H:i:s');
			}

			if (!is_null($request['status2'])){
				$homeAd->status_2 = $request['status2'];
			}

			//upload for image
			if (!empty($request['mediaImage2'])){
				$homeAd->image_2 = $request['mediaImage2'];
			}
	
			if ($request->hasFile('fileImage2')){
				$homeAd->image_2 = $this->imageUpload($request, 'fileImage2', public_path().'/images/advertisement/');
			}

			$homeAd->update();
		}
		catch (\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to update !!!');
			return redirect()->route('backend.home-advertisement.index');
		}

		$request->session()->flash('successMessage', 'Home advertisement updated successfully !!!');
		return redirect()->route('backend.home-advertisement.index');
	}

	public function destroy(Request $request, $id)
	{
		if ($request->ajax()){
			try{
				Advertisement::where('id', $id)->update(['status' => 0]);
			}
			catch(\Exception $e){
				return response()->json(['status' => 'Failed to update advertisement !!!']);
			}

			return response()->json(['status' => 'Advertisement updated successfully !!!']);
		}
	}

	public function imageUpload($request, $formImageName, $path)
	{
		if ($request->hasFile($formImageName)) {
			$image = $request->file($formImageName);
			$imageName = $image->getClientOriginalName();
			$uniqueName = time() . '-' . $imageName;
			$image->move($path, $uniqueName);
			return $uniqueName;
		}
	}
}