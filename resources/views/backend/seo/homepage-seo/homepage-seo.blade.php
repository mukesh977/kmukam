@extends('backend.layouts.master')
@section('title', 'Homepage Seo')

@section('content-header')
	<div class="content-header"></div>
@endsection

@section('content')
	<form role="form" method="post" action="{{ route('backend.seo.homepage.store') }}" enctype="multipart/form-data">
    @csrf
		<div class="row">
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="card card-primary">
	        <div class="card-header">
	          <h3 class="card-title">Homepage Seo</h3>
	        </div>
	        <!-- /.card-header -->
	        <!-- form start -->

          <div class="card-body">
          	
            <div class="form-group">
              <label for="seoTitle">Seo Title</label>
              <input type="text" class="form-control" name="seoTitle" value="{{ !empty($seo)? $seo->meta_title : '' }}">

              @if ($errors->has('seoTitle'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('seoTitle') }}
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="seoKeyword">Seo Keyword</label>
              <input type="text" class="form-control" name="seoKeyword" value="{{ !empty($seo)? $seo->meta_keyword : '' }}">

              @if ($errors->has('seoKeyword'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('seoKeyword') }}
                </span>
              @endif
            </div>
            
            <div class="form-group">
              <label for="seoDescription">Seo Description</label>
              <textarea class="form-control" name="seoDescription">{{ !empty($seo)? $seo->meta_description : '' }}</textarea>

              @if ($errors->has('seoDescription'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('seoDescription') }}
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="title">og Title (for facebook, twitter)</label>
              <input type="text" class="form-control" name="title" value="{{ !empty($seo)? $seo->title : '' }}">

              @if ($errors->has('title'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('title') }}
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="description">og Description (for facebook, twitter)</label>
              <textarea class="form-control" name="description">{{ !empty($seo)? $seo->description : '' }}</textarea>

              @if ($errors->has('description'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('description') }}
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="featureImage">Choose Image (for facebook, twitter)</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image" id="image" accept="image/*">
                  <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                </div>
                <div class="input-group-append">
                </div>
              </div>

              @if ($errors->has('image'))
                <span class="help-block error" style="color: #f86c6b;">
                  {{ $errors->first('image') }}
                </span>
              @endif

              <div class="col-md-12 pl-0" id="image_preview" style="margin-top: 10px;">
                <img src="{{ !empty($seo->image)? asset('images/seo/'. $seo->image) : '' }}" width="200px" />
              </div>

            </div>

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
    				<input type="submit" class="btn btn-primary" value="Update">
	    		</div>
	      </div>
	      <!-- /.card -->

	    </div>
	  </div>
  </form>
@endsection

@section('after-script')

  <script type="text/javascript">
    function readImageURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#image_preview').empty();
          $('#image_preview').append('<img src="'+ e.target.result +'" width="200px" />');
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $(document).ready(function() {
      
      $("#image").change(function(){ readImageURL(this); });
     
    });

  </script>
@endsection