@extends('backend.layouts.master')
@section('title', 'Khabarmukam | Edit Page')

@section('content-header')
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('content')
	<form role="form" method="post" action="{{ route('backend.page.update', $editPage->id) }}" enctype="multipart/form-data">
		<div class="row">
      @csrf
      @method('patch')
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="card card-primary">
	        <div class="card-header">
	          <h3 class="card-title">Pages</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>

            <div class="card-tools" style="display: flex;">
              <div style="margin-right: 30px;">
                <a href="{{ route('backend.page.index') }}" class="btn btn-success btn-xs" title="List Page">List Page</a>
                <a href="{{ route('backend.page.create') }}" class="btn btn-success btn-xs" title="Add Page">Add Page</a>
              </div>
            </div>

	        </div>
	        <!-- /.card-header -->
	        <!-- form start -->

          <div class="card-body">
          	
            <div class="form-group">
              <label for="linkName">Link Name</label>
              <input type="text" class="form-control" name="linkName" value="{{ !empty($editPage)? $editPage->link_name : '' }}">
                
              @if ($errors->has('linkName'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('linkName') }}
                </span>
              @endif

            </div>

            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" value="{{ !empty($editPage)? $editPage->title : '' }}">
                
              @if ($errors->has('title'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('title') }}
                </span>
              @endif

            </div>

            <div class="form-group">
              <label for="slug">Slug</label>
              <input type="text" class="form-control" name="slug" value="{{ !empty($editPage)? $editPage->slug : '' }}">
                
              @if ($errors->has('slug'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('slug') }}
                </span>
              @endif

            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" name="description" id="description">{{ !empty($editPage)? $editPage->description : '' }}</textarea>
              
              @if ($errors->has('description'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('description') }}
                </span>
              @endif

	          </div>
          </div>
          <!-- /.card-body -->
	      </div>
	      <!-- /.card -->
	    </div>

      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary collapsed-card">
          <div class="card-header">
            <h3 class="card-title">Seo</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-plus"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->

          <div class="card-body" style="display: none;">
            
            <div class="form-group">
              <label for="seoTitle">Seo Title</label>
              <input type="text" class="form-control" name="seoTitle" value="{{ !empty($editPage)? $editPage->meta_title : '' }}">

              @if ($errors->has('seoTitle'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('seoTitle') }}
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="seoKeyword">Seo Keyword</label>
              <input type="text" class="form-control" name="seoKeyword" value="{{ !empty($editPage)? $editPage->meta_keyword : '' }}">

              @if ($errors->has('seoKeyword'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('seoKeyword') }}
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="seoDescription">Seo Description</label>
              <textarea class="form-control" name="seoDescription">{{ !empty($editPage)? $editPage->meta_description : '' }}</textarea>

              @if ($errors->has('seoDescription'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('seoDescription') }}
                </span>
              @endif
            </div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <div class="col-12" style="margin-bottom: 10px;">
        <a href="{{ route('backend.page.index') }}" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="Update" class="btn btn-success float-right">
      </div>
	    
	  </div>
  </form>
@endsection

@section('after-script')
  <script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
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
      CKEDITOR.replace('description');
      $("#coverImage").change(function(){ readCoverImageURL(this); });
    });

  </script>
@endsection