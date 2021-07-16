<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

class PageController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}

	public function index(Request $request)
	{
		if($request->ajax())
    {
      $pages = Page::all();

      return Datatables::of($pages)
              ->editColumn('description', function($data){
                return Str::words($data->description, 20);
              })
              ->editColumn('action', function($data){

                $authRoles = Auth::user()->roles;
                foreach( $authRoles as $role)
                  $roles[] = $role->name;

                $btn = '<a href="'. url('/admin/page/'.$data->id. '/edit') .'" class="btn btn-success btn-sm mr-5 edit" title="Edit">Edit</a>';

                if(in_array('admin', $roles))
                {
                  $btn .= '<a href="#" class="btn btn-danger btn-sm delete" title="Delete" data-pageid="'. $data->id .'">Delete</a>';
                }

                return $btn;
              })
              ->rawColumns(['description', 'action'])
              ->editColumn('created_at', '{{ \Carbon\Carbon::create($created_at)->diffForHumans() }}')
              ->make(true);
    }

		return view('backend.pages.index');
	}

	public function create()
	{
		return view('backend.pages.create');
	}

	public function store(Request $request)
	{
		$request->validate([
  		'linkName' => 'required|string',
  		'title' => 'required|string',
  		'slug' => 'required|string',
  		'description' => 'required',
    ]);

    try{
      $page = new Page();
      $page->link_name = $request['linkName'];
      $page->title = $request['title'];
      $page->slug = $request['slug'];
      $page->description = $request['description'];
      
      // $slug = Str::slug($request['title'], '-');
      // $page->slug = $slug;
      
      $page->meta_keyword = $request['seoKeyword'];
      $page->meta_title = $request['seoTitle'];
      $page->meta_description = $request['seoDescription'];
      $page->save();
    	
    }
    catch( \Exception $e)
    {
      request()->session()->flash('unsuccessMessage', 'Failed to add new page !!!');
    	return redirect()->back();
    }

    request()->session()->flash('successMessage', 'New page added successfully !!!');
  	return redirect()->route('backend.page.index');
	}

	public function show($id)
	{
			//
	}

	public function edit($id)
	{
		$editPage = Page::where('id', '=', $id)->first();
  	return view('backend.pages.edit', compact('editPage'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
  		'linkName' => 'required|string',
  		'title' => 'required|string',
      'slug' => 'required|string',
  		'description' => 'required',
    ]);

    try{
      $page = Page::where('id', $id)->first();
      $page->link_name = $request['linkName'];
      $page->title = $request['title'];
      $page->slug = $request['slug'];
      $page->description = $request['description'];
      
      // $slug = Str::slug($request['title'], '-');
      // $page->slug = $slug;
      
      $page->meta_keyword = $request['seoKeyword'];
      $page->meta_title = $request['seoTitle'];
      $page->meta_description = $request['seoDescription'];
      $page->update();
    	
    }
    catch( \Exception $e)
    {
      request()->session()->flash('unsuccessMessage', 'Failed to update page !!!');
    	return redirect()->back();
    }

    request()->session()->flash('successMessage', 'Page updated successfully !!!');
  	return redirect()->route('backend.page.index');
	}

	public function destroy(Request $request, $id)
	{
		if ($request->ajax()){
			try{
				Page::where('id', $id)->delete();
			}
			catch (\Exception $e){
				return response()->json(['status' => 'Failed to delete page !!!']);
			}

			return response()->json(['status' => 'Page deleted successfully !!!']);
		}
	}
}
