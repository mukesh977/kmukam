@extends('backend.layouts.master')

@section('title', 'User | Create')

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
          <h3 class="card-title"><strong>Add User</strong></h3>

          <div class="card-tools" style="display: flex;">
            <div style="margin-right: 10px;">
              <a href="{{ route('backend.user.index') }}" class="btn btn-primary btn-xs pull-right" title="List Users">
                List Users
              </a>
            </div>
          </div>
	        	
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{ route('backend.user.store') }}">
          @csrf

          <div class="card-body">
          	
          	<div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">

              @if ($errors->has('name'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('name') }}
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail">

              @if ($errors->has('email'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('email') }}
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password">

              @if ($errors->has('password'))
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
            	$count = 0; $roleError = ''; 

            	if ($errors->has('roles'))
	              $roleError = 'color: #f86c6b';
            ?>
            <div class="form-group">
              <label for="roles">Roles</label>
              
              <div class="form-check">
              	@foreach( $roles as $role )
	                
	                <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}" @if(is_array(old('roles')) && in_array($role->id, old('roles'))) checked @endif>
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
            <button type="submit" class="btn btn-primary btn-sm">Add User</button>
          </div>

        </form>
      </div>
      <!-- /.card -->

    </div>
  </div>
@endsection