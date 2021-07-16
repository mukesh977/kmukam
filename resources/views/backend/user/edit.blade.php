@extends('backend.layouts.master')

@section('title', 'User | Edit')

@section('content-header')
	<!-- Content Header (Page header) -->
	<div class="content-header"></div>
	<!-- /.content-header -->
@endsection

@section('content')
	<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><strong>Edit User</strong></h3>

          <div class="card-tools" style="display: flex;">
            <div style="margin-right: 10px;">
              <a href="{{ route('backend.user.index') }}" class="btn btn-primary btn-xs link" title="List User">List User</a>
            </div>

            <div style="margin-right: 10px;">
              <a href="{{ route('backend.user.create') }}" class="btn btn-primary btn-xs link" title="Add User">Add User</a>
            </div>
          </div>

        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{ route('backend.user.update', $editUser->id) }}">
          @method('PATCH')
          @csrf

          <div class="card-body">
          	
          	<div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ !empty($editUser->name)? $editUser->name : '' }}" placeholder="Name">

              @if ($errors  ->has('name'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('name') }}
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="email" value="{{ !empty($editUser->email)? $editUser->email : '' }}" placeholder="E-mail">

              @if ($errors->has('email'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('email') }}
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password">

              <span class="help-block" style="color: #f86c6b;">
              	( Note: If you do not want to update password, leave password field as it is !!! )
							</span>

              @if ($errors->has('password'))
                <br>
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('password') }}
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="password confirmation">Password Confirmation</label>
              <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation">
            </div>

            <?php 
            	$count = 0; $roleError = ''; $editRoles = array(); 

            	foreach( $editUser->roles as $r )
             		$editRoles[] = $r->id;

            	if ($errors->has('roles'))
	              $roleError = 'color: #f86c6b';
            ?>
            <div class="form-group">
              <label for="roles">Roles</label>
              
              <div class="form-check">
              	@foreach( $roles as $role )
	                
	                <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}" @if(in_array($role->id, $editRoles)) checked @endif>
	                <label style="{{ $roleError }}">{{ $role->description }}</label>

	                <a data-toggle="collapse" data-target="#permission_{{ $count++ }}">( <i>Show Permission </i> )</a>
		              <div id="permission_{{ $count - 1 }}" class="collapse">
		                  <ul>
		                     @foreach( $role->permissions as $permission )
		                     	<li>{{ $permission->description }}</li>
		                     @endforeach
		                  </ul>
		              </div>
									<br>

	              @endforeach
              </div>

            </div>

          </div>
          <!-- /.card-body -->

          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Update User</button>
          </div>

        </form>
      </div>
      <!-- /.card -->

    </div>
  </div>
@endsection