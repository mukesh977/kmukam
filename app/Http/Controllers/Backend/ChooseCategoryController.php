<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ChooseCategory;

class ChooseCategoryController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}

	public function index()
	{
		$categories = Category::where('parent_id', null)->get();
		$chooseCategories = ChooseCategory::all();
		return view('backend.choose-category.index', compact('categories', 'chooseCategories'));
	}

	public function store(Request $request)
	{
		ChooseCategory::where('key', 'tab_1')->update(['value' => $request['tab1']]);
		ChooseCategory::where('key', 'tab_2')->update(['value' => $request['tab2']]);
		ChooseCategory::where('key', 'tab_3')->update(['value' => $request['tab3']]);
		ChooseCategory::where('key', 'tab_4')->update(['value' => $request['tab4']]);
		// ChooseCategory::where('key', 'tab_5')->update(['value' => $request['tab5']]);
		// ChooseCategory::where('key', 'tab_6')->update(['value' => $request['tab6']]);

		$request->session()->flash('successMessage', 'Information updated successfully !!!');
		return redirect()->route('backend.choose-category.index');
	}
}
