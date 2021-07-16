<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use App\Models\Author;
use App\Models\AuthorSocialMedia;

class AuthorController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}

	public function index(Request $request)
	{
		if($request->ajax())
    {
      $authors = Author::orderBy('status', 'DESC')->orderBy('created_at', 'DESC')->get();

			return Datatables::of($authors)
              ->editColumn('image', '<img src="{{ asset(\'images/author/\'. $image) }}" width="100px">')
							->editColumn('status', '<?php if ($status==1){ echo "<span class=\"badge badge-success\">Active</span>"; }else{ echo "<span class=\"badge badge-danger\">Inactive</span>";} ?>')
              ->editColumn('action', function($data){
                
                $authRoles = Auth::user()->roles;
                foreach( $authRoles as $role)
                  $roles[] = $role->name;

                $btn = '<a href="'. route('backend.author.edit', $data->id) .'" class="btn btn-success btn-sm mr-5 edit" title="Edit">Edit</a>';

                if(in_array('admin', $roles)){
                  $btn .= '<a href="#" class="btn btn-danger btn-sm delete" title="Delete" data-authorid="'. $data->id .'">Delete</a>';
                }
                
                return $btn;
              })
              ->rawColumns(['image', 'status', 'action'])
              ->editColumn('created_at', '{{ date(\'d M, Y\', strtotime($created_at)) }}')
              ->make(true);
		}
		
		return view('backend.author.index');
	}

	public function create()
	{
		return view('backend.author.create');
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'socialMediaName.*' => 'required',
			'socialMediaIcon.*' => 'required',
			'socialMediaLink.*' => 'required',
		]);

		
			$author = new Author();
			$author->name = $request['name'];
			$author->designation = $request['designation'];
			$author->email = $request['email'];

			if (!empty($request['status']))
				$author->status = $request['status'];
			
			if (!empty($request['order'])){
				$author->order = $request['order'];
			}
			else{
				$lastRecord = Author::orderBy('created_at', 'DESC')->first();
				if (!empty($lastRecord))
					$author->order = $lastRecord->order + 1;
				else
					$author->order = 1;
			}

			$author->image = $this->imageUpload($request, 'image', public_path(). '/images/author');
			$author->save();

			$countSocialMediaIcon = count($request['socialMediaIcon']);
			for ($i = 0; $i < $countSocialMediaIcon; $i++){
				$socialMedia = new AuthorSocialMedia();
				$socialMedia->author_id = $author->id;
				$socialMedia->name = $request['socialMediaName'][$i];
				$socialMedia->social_media_icon = $request['socialMediaIcon'][$i];
				$socialMedia->social_media_link = $request['socialMediaLink'][$i];
				$socialMedia->save();
			}
		

		$request->session()->flash('successMessage', 'Author created successfully !!!');
		return redirect()->route('backend.author.index');
	}

	public function show($id)
	{
			//
	}

	public function edit($id)
	{
		$editAuthor = Author::with('socialMedia')->where('id', $id)->first();
		return view('backend.author.edit', compact('editAuthor'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required',
			'socialMediaName.*' => 'required',
			'socialMediaIcon.*' => 'required',
			'socialMediaLink.*' => 'required',
		]);

		try{
			$author = Author::where('id', $id)->first();
			$author->name = $request['name'];
			$author->designation = $request['designation'];
			$author->email = $request['email'];
			$author->status = $request['status'];
			
			if (!empty($request['order'])){
				$author->order = $request['order'];
			}
			else{
				$lastRecord = Author::orderBy('created_at', 'DESC')->first();
				if (!empty($lastRecord))
					$author->order = $lastRecord->order + 1;
				else
					$author->order = 1;
			}

			if ($request->hasFile('image')){
				\File::delete('images/author/'. $author->image);
				$author->image = $this->imageUpload($request, 'image', public_path(). '/images/author');
			}

			$author->update();

			$countSocialMediaIcon = count($request['socialMediaIcon']);
			AuthorSocialMedia::where('author_id', $author->id)->delete();
			for ($i = 0; $i < $countSocialMediaIcon; $i++){
				$socialMedia = new AuthorSocialMedia();
				$socialMedia->author_id = $author->id;
				$socialMedia->name = $request['socialMediaName'][$i];
				$socialMedia->social_media_icon = $request['socialMediaIcon'][$i];
				$socialMedia->social_media_link = $request['socialMediaLink'][$i];
				$socialMedia->save();
			}
		}
		catch(\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to update author !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Author updated successfully !!!');
		return redirect()->route('backend.author.index');
	}

	public function destroy(Request $request, $id)
	{
		if ($request->ajax()){
			try{
				Author::where('id', $id)->update(['status' => 0]);
			}
			catch (\Exception $e){
				return response()->json(['status' => 'Failed to delete author !!!']);
			}

			return response()->json(['status' => 'Author deleted successfully !!!']);
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
