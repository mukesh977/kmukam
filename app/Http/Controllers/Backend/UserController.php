<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
	public function __construct()
  {
    $this->middleware('auth');
  }
  
 	public function index(Request $request)
  {
    // $users = User::with('roles')->paginate(24);
    if($request->ajax()){
			$users = User::with('roles')->get();
			// dd($users);

      return Datatables::of($users)
              ->editColumn('roles', function($users){
								$roles = '';
								$countRoles = $users->roles->count();
								for ($i = 0; $i < $countRoles; $i++){
									if ($i == ($countRoles-1))
										$roles = $roles .''. $users->roles[$i]->description;
									else
										$roles = $roles .''. $users->roles[$i]->description.', ';
								}
                return $roles;
              })
              ->editColumn('action', function($data){
                
                $authRoles = Auth::user()->roles;
                foreach( $authRoles as $role)
                  $roles[] = $role->name;

                $btn = '<a href="'. route('backend.user.edit', $data->id) .'" class="btn btn-success btn-xs mr-5 edit" title="Edit User">Edit</a>';

                if(in_array('admin', $roles)){
                  $btn .= '<a href="#" class="btn btn-danger btn-xs delete" title="Delete" data-userid="'. $data->id .'">Delete</a>';
                }
                
                return $btn;
              })
              ->rawColumns(['action'])
              ->editColumn('created_at', '{{ \Carbon\Carbon::create($created_at)->diffForHumans() }}')
              ->make(true);
    }
      
    return view('backend.user.index');
  }


  public function create()
  {
  	$roles = Role::with('permissions')->get();
  	return view('backend.user.create', compact('roles'));
  }

  public function store(Request $request)
  {
  	$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|string|min:8|confirmed',
			'roles' => 'required',
		]);

		try{
			$data = $request->all();
			$data['password'] = Hash::make($request['password']);
			$user = User::create($data);

			foreach( $request['roles'] as $role )
				$user->roles()->attach($role);
		}
		catch (\Exception $e){
			request()->session()->flash('unsuccessMessage', 'Failed to create user !!!');
			return redirect()->back();
		}

		request()->session()->flash('successMessage', 'User created successfully !!!');
		return redirect()->route('backend.user.index');
  }

  public function edit($id = '')
  {
      $roles = Role::with('permissions')->get();
      $editUser = User::with('roles')->where('id', '=', $id)->first();
      return view('backend.user.edit', compact('editUser', 'roles'));
  }

  public function update($id = '', Request $request)
  {
		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|email|max:255|unique:users,email,'.$id,
			'password' => 'nullable|string|min:8|confirmed',
			'roles' => 'required',
		]);

		try
		{
			$user = User::where('id', '=', $id)->first();
			$user->name = $request['name'];
			$user->email = $request['email'];

			if( !empty($request['password']))
					$user->password = Hash::make($request['password']);

			$user->update();

			$userWithRoles = User::with('roles')->where('id', '=', $id)->first();

			if (!empty($userWithRoles)){
				foreach( $userWithRoles->roles as $role )
						$user->removeRole($role->name);
			}

			foreach( $request['roles'] as $role )
					$user->roles()->attach($role);
		}
		catch( \Exception $e ){
				request()->session()->flash('unsuccessMessage', 'Failed to update user !!!');
				return redirect()->back();
		}

		request()->session()->flash('successMessage', 'User updated successfully !!!');
		return redirect()->route('backend.user.index');
  }


  public function destroy($id='', Request $request)
  {	
		if ($request->ajax()){
			try{
				$userWithRoles = User::with('roles')->where('id', '=', $id)->first();
				$user = User::where('id', $id)->delete();

				foreach( $userWithRoles->roles as $role )
						$userWithRoles->removeRole($role->name);
			}
			catch (\Exception $e){
				return response()->json(['status' => 'Failed to delete user !!!']);
			}

			return response()->json(['status' => 'User deleted successfully !!!']);
		}
  }
}
