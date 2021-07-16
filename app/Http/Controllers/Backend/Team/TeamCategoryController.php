<?php

namespace App\Http\Controllers\Backend\Team;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team\TeamCategory;
use App\Models\Team\Team;
use Illuminate\Support\Str;

class TeamCategoryController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');

	}

	public function index()
	{
		$categories = TeamCategory::paginate(10);
		return view('backend.team.category.index', compact('categories'));
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required|string',
		]);

		try {
			$category = new TeamCategory();
			$category->name = $request['name'];

			$slug = Str::slug($request['name'], '-');
			$flag = 1;
			$counter = 1;
			$tempSlug = $slug;

			do {
				$tempCategory = TeamCategory::where('slug', $tempSlug)->first();
				if (empty($tempCategory)) {
					$flag = 0;
				} else {
					$tempSlug = $slug . '-' . $counter++;
				}
			} while ($flag != 0);

			$category->slug = $tempSlug;

			if (!empty($request['order'])) {
				$category->order = $request['order'];
			} else {
				$totalCategory = TeamCategory::count();
				$category->order = $totalCategory + 1;
			}

			$category->save();
		} catch (\Exception $e) {
			request()->session()->flash('unsuccessMessage', 'Failed to add new team category !!!');
			return redirect()->back();
		}

		request()->session()->flash('successMessage', 'New team category added successfully !!!');
		return redirect()->back();
	}

	public function edit($id = '')
	{
		$categories = TeamCategory::paginate(10);
		$editCategory = TeamCategory::where('id', $id)->first();
		return view('backend.team.category.edit', compact('editCategory', 'categories'));
	}

	public function update($id = '', Request $request)
	{
		$request->validate([
			'name' => 'required|string',
		]);

		try {
			$category = TeamCategory::where('id', $id)->first();
			$category->name = $request['name'];
			$category->order = $request['order'];
			$category->update();
		} catch (\Exception $e) {
			request()->session()->flash('unsuccessMessage', 'Failed to update team category !!!');
			return redirect()->back();
		}

		request()->session()->flash('successMessage', 'Team category updated successfully !!!');
		return redirect()->back();
	}

	public function destroy(Request $request)
	{
		$deleteCategoryId = $request['category_id_delete'];

		try {
			$category = TeamCategory::where('id', '=', $deleteCategoryId)->delete();
			$teams = Team::where('cat_id', $deleteCategoryId)->get();

			foreach ($teams as $team) {
				Storage::delete($team->featured_image);
				Team::where('id', '=', $team->id)->delete();
			}
		} catch (\Exception $e) {
			return redirect('/admin/team/category')->with('unsuccessMessage', 'Failed to delete team category !!!');
		}

		return redirect('/admin/team/category')->with('successMessage', 'Team Category deleted successfully !!!');
	}
}
