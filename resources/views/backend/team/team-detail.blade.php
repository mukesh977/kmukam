@extends('backend.layouts.master')
@section('title', 'Team Detail')

@section('content-header')
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Team Detail</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Team Detail</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('content')
	<form role="form" method="post" action="{{ url('/admin/team-detail') }}" enctype="multipart/form-data">
		@csrf

    <div class="row">
      <div class="col-md-12">
        @include('backend.messages.message')
      </div>
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Team Detail</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body">
          	
            <div class="form-group">
              <label for="exampleInputFile">Cover Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="coverImage" id="coverImage" accept="image/*">
                  <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                </div>
                <div class="input-group-append">
                </div>
              </div>

              @if ($errors->has('coverImage'))
                <span class="help-block error" style="color: #f86c6b;">
                  {{ $errors->first('coverImage') }}
                </span>
              @endif

              <div class="col-md-12 pl-0" id="cover_image_preview" style="margin-top: 10px;">
                <img src="{{ ($teamDetail != null)? (asset(Storage::url($teamDetail->cover_image))) : '' }}" width="200px" />
              </div>
            </div>

          </div>
          <!-- /.card-body -->
	      </div>
	      <!-- /.card -->

	    </div>

      <div class="col-md-12">
        <a href="{{ url('/admin/blog') }}" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="Update" class="btn btn-success float-right">
      </div>

	  </div>


  </form>
@endsection

@section('after-script')

  <script type="text/javascript">
    
    function readCoverImageURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#cover_image_preview').empty();
          $('#cover_image_preview').append('<img src="'+ e.target.result +'" width="200px" />');
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $(document).ready(function() {
    	
      $("#coverImage").change(function(){ readCoverImageURL(this); });
    });

  </script>
@endsection