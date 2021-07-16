@extends('backend.layouts.master')

@section('title', 'Khabarmukam | Add news')

@section('after-head')
<link rel="stylesheet" href="{{ asset('backend/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Add News</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Add News</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
<form class="form-horizontal" method="post" action="{{ route('backend.news.store') }}" enctype="multipart/form-data">
  @csrf

  <div class="row">

    <div class="col-md-8">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add News</h3>
        </div>
        <div class="card-body">

          <div class="row">
            <div class="col-md-12 mb-10">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">

                @if ($errors->has('title'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('title') }}
                </span>
                @endif
              </div>
            </div>

            <div class="col-md-12 mb-10">
              <div class="form-group">
                <label>Category / Sub-category</label>
                <div class="select2-primary">
                  <select class="select2" id="category" name="categoryOrSubcategory[]" multiple="multiple"
                    data-placeholder="Select Category" data-dropdown-css-class="select2-primary" style="width: 100%;">

                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                      {{ !empty(old('categoryOrSubcategory'))? (in_array($category->id, old('categoryOrSubcategory'))? 'selected' : '') : '' }}>
                      {{ $category->title_np}}</option>

                    @foreach ($category->subCategories as $subCategory)
                    <option value="{{ $subCategory->id }}"
                      {{ !empty(old('categoryOrSubcategory'))? (in_array($subCategory->id, old('categoryOrSubcategory'))? 'selected' : '') : '' }}>
                      ----{{ $subCategory->title_np }}</option>
                    @endforeach

                    @endforeach

                  </select>

                  @if ($errors->has('categoryOrSubcategory.*'))
                  <span class="help-block" style="color: #f86c6b;">
                    {{ $errors->first('categoryOrSubcategory.*') }}
                  </span>
                  @endif

                </div>
              </div>
              <!-- /.form-group -->
            </div>

            <div class="col-md-12 mb-10">
              <div class="form-group">
                <label for="coverImage">Choose Featured Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    {{-- <input type="file" class="custom-file-input" name="coverImage" id="coverImage" accept="image/*"> --}}
                    <input class="custom-file-input" id="coverImage" data-toggle="modal"
                      data-target="#featuredImageModal" accept="image/*">

                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>

                  <div class="input-group-append">
                  </div>
                </div>
                @include('backend.partials.news-media-library-modal.modal')

                <div class="col-md-12 pl-0" id="media_image_preview" style="margin-top: 10px;"></div>
                <div class="col-md-12 pl-0" id="file_image_preview" style="margin-top: 10px;"></div>

                @if ($errors->has('image'))
                <span class="help-block error" style="color: #f86c6b;">
                  {{ $errors->first('image') }}
                </span>
                @endif

                @if ($errors->has('featuredImageFromComp'))
                <span class="help-block error" style="color: #f86c6b;">
                  {{ $errors->first('featuredImageFromComp') }}
                </span>
                @endif

              </div>
            </div>

            <div class="col-md-12 mb-10" id="video_field" style="display:none;">
              <div class="form-group">
                <label for="videoId">Video Id</label>
                <input type="text" class="form-control" name="videoId" placeholder="Video Id"
                  value="{{ old('videoId') }}">

                @if ($errors->has('videoId'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('videoId') }}
                </span>
                @endif
              </div>
            </div>

            <div class="col-md-12 mb-10">
              <div class="form-group">
                <label for="shortDescription">Short Description</label>
                <textarea type="text" class="form-control" name="shortDescription"
                  id="shortDescription">{{ old('shortDescription') }}</textarea>

                @if ($errors->has('shortDescription'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('shortDescription') }}
                </span>
                @endif
              </div>
            </div>

            <div class="col-md-12 mb-10">
              <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" name="description"
                  id="description">{{ old('description') }}</textarea>

                @if ($errors->has('description'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('description') }}
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
    <div class="col-md-4">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title"></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
              title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">

          <div class="row">
            <div class="col-md-12 mb-10">
              <div class="form-group">
                <label for="author">Author</label>
                <select class="form-control" name="author">
                  <option value="">Select Author</option>

                  @foreach ($authors as $author)
                  <option value="{{ $author->id }}"
                    {{ !empty(old('author'))? ((old('author')==$author->id)? 'selected' : '') : '' }}>
                    {{ $author->name }}</option>
                  @endforeach

                </select>

                @if ($errors->has('author'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('author') }}
                </span>
                @endif
              </div>

              <div class="select2-primary">
                <label for="trend">Trend</label>
                <select class="form-control select2" name="trend[]" multiple="" data-placeholder="Select Trends">

                  @foreach ($trends as $trend)
                  <option value="{{ $trend->id }}"
                    {{ !empty(old('trend'))? ((old('trend')==$trend->id)? 'selected' : '') : '' }}>{{ $trend->title }}
                  </option>
                  @endforeach

                </select>                
              </div>
            </div>

            <div class="col-md-12 mb-10">
              <div class="form-group">
                <label for="author">Published Date & Time</label>
                <div class="row">
                  <div class="col-md-6">
                    <input type="date" class="form-control" name="publishDate" value="{{ old('publishDate') }}">
                  </div>
                  <div class="col-md-6">
                    <input type="time" class="form-control" name="publishTime" value="{{ old('publishTime') }}">
                  </div>
                </div>

                @if ($errors->has('publishDate'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('publishDate') }}
                </span>
                @endif

                @if ($errors->has('publishTime'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('publishTime') }}
                </span>
                @endif

              </div>
            </div>

            <div class="col-md-12 mb-10">
              <div class="row">
                <div class="col-md-6" style="margin-bottom: 10px;">
                  <div class="form-group">
                    <label>Top News</label><br>

                    <div class="row">
                      <div class="col-md-12" style="margin-bottom: 5px;">
                        <input type="radio" name="topNews" value="1" onclick="showTopNewsBranch()"
                          {{ !empty(old('topNews'))? ((old('topNews')==1)? 'checked' : '') : '' }}>
                        <span>Enable</span>

                        <div class="row" id="topNewsBranch" style="margin-left: 15px; display: none;">
                          <div class="col-md-12">
                            <input type="checkbox" id="showImage" name="showImage" value="1"
                              {{ !empty(old('showImage'))? ((old('showImage')==1)? 'checked' : '') : '' }}>
                            <span> Show image<span><br>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <input type="radio" name="topNews" value="0" onclick="hideTopNewsBranch()"
                          {{ !is_null(old('topNews'))? ((old('topNews')==0)? 'checked' : '') : '' }}>
                        <span>Disable</span><br>
                      </div>
                    </div>

                    @if ($errors->has('topNews'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('topNews') }}
                    </span>
                    @endif

                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Highlighted News</label><br>

                    <div class="row">
                      <div class="col-md-12" style="margin-bottom: 5px;">
                        <input type="radio" name="highlightedNews" value="1"
                          {{ !is_null(old('highlightedNews'))? ((old('highlightedNews')==1)? 'checked' : '') : '' }}>
                        <span>Enable</span>
                      </div>

                      <div class="col-md-12">
                        <input type="radio" name="highlightedNews" value="0"
                          {{ !is_null(old('highlightedNews'))? ((old('highlightedNews')==0)? 'checked' : '') : '' }}>
                        <span>Disable</span><br>
                      </div>

                    </div>

                    @if ($errors->has('highlightedNews'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('highlightedNews') }}
                    </span>
                    @endif

                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Featured News</label><br>

                    <div class="row">
                      <div class="col-md-12" style="margin-bottom: 5px;">
                        <input type="radio" name="featuredNews" value="1"
                          {{ !is_null(old('featuredNews'))? ((old('featuredNews')==1)? 'checked' : '') : '' }}>
                        <span>Enable</span>
                      </div>

                      <div class="col-md-12">
                        <input type="radio" name="featuredNews" value="0"
                          {{ !is_null(old('featuredNews'))? ((old('featuredNews')==0)? 'checked' : '') : '' }}>
                        <span>Disable</span><br>
                      </div>

                    </div>

                    @if ($errors->has('featuredNews'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('featuredNews') }}
                    </span>
                    @endif

                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Status</label><br>

                    <div class="row">
                      <div class="col-md-12" style="margin-bottom: 5px;">
                        <input type="radio" name="status" value="1"
                          {{ !is_null(old('status'))? ((old('status')==1)? 'checked' : '') : '' }}>
                        <span>Publish</span>
                      </div>

                      <div class="col-md-12">
                        <input type="radio" name="status" value="0"
                          {{ !is_null(old('status'))? ((old('status')==0)? 'checked' : '') : '' }}>
                        <span>Unpublish</span><br>
                      </div>

                    </div>

                    @if ($errors->has('status'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('status') }}
                    </span>
                    @endif

                  </div>
                </div>

              </div>

            </div>

            <div class="col-md-12 mb-10">
              <hr>
              <div class="form-group">
                <label for="seoKeyword">Seo Keyword</label>
                <input type="text" class="form-control" name="seoKeyword" value="{{ old('seoKeyword') }}">

                @if ($errors->has('seoKeyword'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('seoKeyword') }}
                </span>
                @endif
              </div>

              <div class="form-group">
                <label for="seoTitle">Seo Title</label>
                <input type="text" class="form-control" name="seoTitle" value="{{ old('seoTitle') }}">

                @if ($errors->has('seoTitle'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('seoTitle') }}
                </span>
                @endif
              </div>

              <div class="form-group">
                <label for="seoDescription">Seo Description</label>
                <textarea class="form-control" name="seoDescription" rows="4">{{ old('seoDescription') }}</textarea>

                @if ($errors->has('seoDescription'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('seoDescription') }}
                </span>
                @endif
              </div>
            </div>

          </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <div class="row">
            <div class="col-md-12" style="margin-bottom: 10px;">
              <input type="submit" value="Add" class="btn btn-primary btn-sm float-right">
            </div>
          </div>
        </div>

      </div>
      <!-- /.card -->
    </div>

  </div>
</form>
@endsection

@section('after-script')
<!--<script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>-->
<script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
<script src="{{ asset('backend/select2/js/select2.full.min.js') }}"></script>
<script>
  function readImageURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          //clears media image 
          $('#media_image_preview').empty();
          $(".gallery-image-item").removeClass("active");
          $("#image").val('');

          //another section starts
          $('#file_image_preview').empty();
          $('#file_image_preview').append('<img src="'+ e.target.result +'" width="200px" />');
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    function hideTopNewsBranch(){
      $('#topNewsBranch').hide();
    }

    function showTopNewsBranch(){
      $('#topNewsBranch').show();
    }
    
    function searchImage(){
      var keywords = $('#keywords').val();
      var url = '{{ url('/') }}';
      var request = $.ajax({
        url: "{{ route('backend.media-library.search') }}",
        method: "GET",
        data: { keywords : keywords },
        dataType: "json"
      });
      
      request.done(function(data) {
        var datas = '';

        for( var i = 0; i < data.length; i++){
          datas = datas + '<img class="gallery-image-item" src="'+ url +'/images/news/low-quality/'+ data[i] +'" data-id="'+ data[i] +'" alt="Gallery Image">';
        }
        
        $("#images").empty();
        $("#images").html(datas);
      });
      
    };

    $(document).ready( function(){
      var baseUrl = '{{ url('/') }}';

      CKEDITOR.replace('shortDescription', {
        filebrowserUploadUrl: "{{ route('backend.ckeditor.image.store', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form',
        height: 500,
        allowedContent: true,
      });
      
      CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{ route('backend.ckeditor.image.store', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form',
        height: 500,
        allowedContent: true,
      });
      
      $('.select2').select2();

      /* media library script starts */
      // $(".gallery-image-item").click(function() {
      $('body').on('click', ".gallery-image-item", function() {
        if($(this).hasClass('active')){
            $(".gallery-image-item").removeClass("active");
        }
        else{
          $(".gallery-image-item").removeClass("active");
          $(this).addClass("active");
        }
        // remove classes from all
        // add class to the one we clicked
      });

      // $('.imagechoose').on('click',function(){
      $('body').on('click', '.imagechoose', function(){
        var value = $(".gallery-image-item.active").attr("data-id");
        $('#image').val(value);
        
        if(value){
          var fileUploadImg = $('#fileUpload').val();
          if (fileUploadImg == ''){
            var fileUploadImg = $('#fileUpload').val('');
          }

          $('#file_image_preview > img').remove();

          $('#media_image_preview > img').remove();
          $('#media_image_preview').append('<img src="'+ baseUrl + '/images/news/' + value +'" width="200px"/>');
        }
      });
      /* media library script ends */

      $('#category').on('change', function(){
        var flag = 0;
        
        $('#category option:selected').each(function(){
          var id = $(this).val();
          
          if (id == 49){
            flag = 1;
          }
        });

        if (flag == 1){
          $('#video_field').show();
        }
        else{
          $('#video_field').hide();
        }
        
        flag = 0;
      });
      
      var request = $.ajax({
        url: "{{ route('backend.ajax.images') }}",
        method: "GET",
        data: {},
        dataType: "json"
      });
      
      request.done(function(data) {
        var datas = '';

        for( var i = 0; i < data.length; i++){
          datas = datas + '<img class="gallery-image-item" src="'+ baseUrl +'/images/news/low-quality/'+ data[i] +'" data-id="'+ data[i] +'" alt="Gallery Image">';
        }
        
        $("#images").empty();
        $("#images").html(datas);
      });

    });
</script>
@endsection