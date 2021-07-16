@extends('backend.layouts.master')
@section('title', 'Team | Edit')

@section('content-header')
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Team</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Edit Team</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('content')
	
  <form class="form-horizontal" method="post" action="{{ url('/admin/team/'. $editTeam->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
  	<div class="row">
      
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Team</h3>

            <div class="card-tools" style="display: flex;">
              
              <div style="margin-right: 10px;">
                <a href="{{ url('/admin/team') }}" class="btn btn-success btn-xs" title="List Team">List Team</a>
              </div>

              <div>
                <a href="{{ url('/admin/team/create') }}" class="btn btn-success btn-xs" title="Add Adventure">Add Team</a>
              </div>

            </div>
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" value="{{ !empty($editTeam)? $editTeam->name : '' }}" placeholder="Name">

                  @if ($errors->has('name'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('name') }}
                    </span>
                  @endif
    						</div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="designation">Designation</label>
                  <input type="text" class="form-control" name="designation" value="{{ !empty($editTeam)? $editTeam->designation : '' }}" placeholder="Designation">

                  @if ($errors->has('designation'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('designation') }}
                    </span>
                  @endif
                </div>
              </div>

						  <div class="col-md-6">
                <div class="form-group">
                  <label for="category">Category</label>
                  <select class="form-control" name="category">
                    <option value=''>Select Category</option>
                    
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}" {{ !empty($editTeam)? (($editTeam->cat_id==$category->id)? 'selected' : '') : '' }}>{{ $category->name }}</option>
                    @endforeach

                  </select>

                  @if ($errors->has('category'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('category') }}
                    </span>
                  @endif
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="order">Order</label>
                  <input type="number" class="form-control" name="order" value="{{ !empty($editTeam)? $editTeam->order : '' }}" placeholder="Order">

                  @if ($errors->has('order'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('order') }}
                    </span>
                  @endif
                </div>
              </div>
						</div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Images</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputFile">Featured Image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="featuredImage" id="featuredImage" accept="image/*">
                      <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                    </div>
                    <div class="input-group-append">
                    </div>
                  </div>

                  @if ($errors->has('featuredImage'))
                    <span class="help-block error" style="color: #f86c6b;">
                      {{ $errors->first('featuredImage') }}
                    </span>
                  @endif

                  <div class="col-md-12 pl-0" id="featured_image_preview" style="margin-top: 10px;">
                    <img src="{{ !empty($editTeam)? asset('images/team/'. $editTeam->featured_image) : '' }}" width="200px" />
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <div class="col-12" style="margin-bottom: 10px;">
        <a href="{{ url('/admin/team') }}" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="Update" class="btn btn-success float-right">
      </div>

    </div>
  </form>

@endsection

@section('after-script')
  <script type="text/javascript">
    function readFeaturedImageURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#featured_image_preview').empty();
          $('#featured_image_preview').append('<img src="'+ e.target.result +'" width="200px" />');
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $(document).ready(function() {
      $("#featuredImage").change(function(){ readFeaturedImageURL(this); });
    });

  </script>
@endsection
