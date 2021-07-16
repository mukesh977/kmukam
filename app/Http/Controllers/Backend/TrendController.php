<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Trend;

class TrendController extends Controller
{
	protected $index_view = 'backend.trend.index';
	protected $create_view = 'backend.trend.create';
	protected $edit_view = 'backend.trend.edit';


	public function __construct()
	{
		return $this->middleware('auth');
	}

	public function index()
	{
		$trends = Trend::asc()->paginate(24);

		return view($this->index_view, compact('trends'));
	}


	public function create()
	{
		return view($this->create_view);
	}


	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required',
			'slug' => 'required|unique:trends,slug',
		]);

		$input = $request->all();
		$input['slug'] = Str::slug($input['slug']);

		if(empty($input['order'])){
			$max = Trend::max('order');
			$input['order'] = $max +1;
		}

		Trend::create($input);

		$request->session()->flash('successMessage', 'Trend added successfully !!!');
		return redirect()->route($this->index_view);
	}

	public function show($id)
	{
		//
	}


	public function edit($id)
	{
		$trend = Trend::where('id', $id)->firstOrFail();

		return view($this->edit_view, compact('trend'));
	}


	public function update(Request $request, $id)
	{
		$trend = Trend::where('id', $id)->firstOrFail();

		$request->validate([
			'title' => 'required',
			'slug' => 'required|unique:trends,slug,'.$id,
		]);

		$input = $request->all();

		$input['slug'] = Str::slug($input['slug']);

		if(empty($input['order'])){
			$max = Trend::max('order');
			$input['order'] = $max +1;
		}

		$trend->update($input);

		$request->session()->flash('successMessage', 'Category updated successfully !!!');
		return redirect()->route($this->index_view);
	}


	public function destroy($id, Request $request)
	{
		if ($request->ajax()) {
			Trend::where('id', $id)->delete();

			return response()->json(['status' => 'Category deleted successfully !!!']);
		}
	}
}
