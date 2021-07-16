<?php

namespace App\Http\Controllers\Backend\Team;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team\TeamCategory;
use App\Models\Team\Team;
use File;

class TeamController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}

	public function index()
	{
		$categories = TeamCategory::with(['team' => function($query){
		                                $query->orderBy('order', 'ASC');
                        		    }])->orderBy('order', 'ASC')->get();
		return view('backend.team.index', compact('categories'));
	}
	
  public function create()
  {
		$categories = TeamCategory::all();
  	return view('backend.team.create', compact('categories'));
	}
	
	public function store(Request $request)
	{
		$request->validate([
      'name' => 'required|string',
      'category' => 'required|numeric|',
      'designation' => 'required|string',
      'featuredImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    try{
      $team = new Team();
			$team->name = $request['name'];
			$team->cat_id = $request['category'];
			$team->designation = $request['designation'];
			$team->featured_image = $this->imageUpload($request, 'featuredImage', public_path(). '/images/team');

			if (!empty($request['order'])){
				$team->order = $request['order'];
			}
			else{
				$lastRecord = Team::orderBy('created_at', 'DESC')->first();
				if (!empty($lastRecord))
					$team->order = $lastRecord->order + 1;
				else
					$team->order = 1;
			}

      $team->save();
		}
		catch (\Exception $e){
			request()->session()->flash('unsuccessMessage', 'Failed to add team !!!');
			return redirect()->back();
		}
    
    request()->session()->flash('successMessage', 'New team added successfully !!!');
    return redirect('/admin/team');
	}

	public function edit($id='')
	{
		$editTeam = Team::where('id', $id)->first();
		$categories = TeamCategory::with('team')->orderBy('order', 'ASC')->get();
		return view('backend.team.edit', compact('editTeam', 'categories'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
      'name' => 'required|string',
      'category' => 'required|numeric|',
      'designation' => 'required|string',
    ]);

    try{
      $team = Team::where('id', $id)->first();
			$team->name = $request['name'];
			$team->cat_id = $request['category'];
			$team->designation = $request['designation'];

			if ($request->hasFile('featuredImage')){
				File::delete(public_path('/images/team/'). $team->featured_image);
				$team->featured_image = $this->imageUpload($request, 'featuredImage', public_path(). '/images/team');
			}

			if (!empty($request['order'])){
				$team->order = $request['order'];
			}
			else{
				$lastRecord = Team::orderBy('created_at', 'DESC')->first();
				if (!empty($lastRecord))
					$team->order = $lastRecord->order + 1;
				else
					$team->order = 1;
			}

      $team->update();
		}
		catch (\Exception $e){
			request()->session()->flash('unsuccessMessage', 'Failed to update team !!!');
			return redirect()->back();
		}
    
    request()->session()->flash('successMessage', 'Team updated successfully !!!');
    return redirect('/admin/team');
	}

	public function destroy(Request $request, $id)
	{
		if ($request->ajax()){
			try{
				$team = Team::where('id', $id)->first();
				Team::where('id', $id)->delete();
				File::delete(public_path('/images/team/'). $team->featured_image);
			}
			catch (\Exception $e){
				return response()->json(['status' => 'Failed to delete team !!!']);
			}

			return response()->json(['status' => 'Team deleted successfully !!!']);
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
