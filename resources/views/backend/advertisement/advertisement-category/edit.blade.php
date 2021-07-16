@extends('backend.layouts.master')

@section('title', 'Edit category advertisement')

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
          <h1>Edit Category Advertisement</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Edit Category Advertisement</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('content')
  <form class="form-horizontal" method="post" action="{{ route('backend.category-advertisement.update', $editCategoryAd->id) }}" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <div class="row">
      
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Introduction</h3>
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-6 mb-10">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Title" value="{{ !empty($editCategoryAd)? $editCategoryAd->title : '' }}">
    
                  @if ($errors->has('title'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('title') }}
                    </span>
                  @endif
                </div>
              </div>

              <div class="col-md-6 mb-10">
                <div class="form-group">
                  <label for="position">Position</label>
                  <input type="text" class="form-control" placeholder="Position" value="{{ !empty($editCategoryAd)? $editCategoryAd->position : '' }}" disabled>
    
                  @if ($errors->has('position'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('position') }}
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
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Advertisement 1</h3>
          </div>
          <div class="card-body">

            <div class="row">
              
              <div class="col-md-4 mb-10">
                <div class="form-group">
                  <label for="link1">Link 1</label>
                  <input type="text" class="form-control" name="link1" placeholder="Link 1" value="{{ !empty($editCategoryAd)? $editCategoryAd->link : '' }}">
    
                  @if ($errors->has('link1'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('link1') }}
                    </span>
                  @endif
                </div>
              </div>

              <div class="col-md-4 mb-10">
                <div class="form-group">
                  <label for="publishDate1">Publish Date 1</label>

                  <div class="row">
                    <div class="col-md-6">
                      <input type="date" class="form-control" name="publishDate1" placeholder="Publish Date 1" value="{{ !empty($editCategoryAd->publish_date)? date('Y-m-d', strtotime($editCategoryAd->publish_date)) : '' }}">
                    </div>
                    <div class="col-md-6">
                      <input type="time" class="form-control" name="publishTime1" placeholder="Publish Time 1" value="{{ !empty($editCategoryAd->publish_date)? date('H:i:s', strtotime($editCategoryAd->publish_date)) : '' }}">
                    </div>
                  </div>
    
                  @if ($errors->has('publishDate1'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('publishDate1') }}
                    </span>
                  @endif

                  @if ($errors->has('publishTime1'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('publishDate1') }}
                    </span>
                  @endif

                </div>
              </div>

              <div class="col-md-4 mb-10">
                <div class="form-group">
                  <label for="endDate1">End Date 1</label>
                  
                  <div class="row">
                    <div class="col-md-6">
                      <input type="date" class="form-control" name="endDate1" placeholder="End Date 1" value="{{ !empty($editCategoryAd->end_date)? date('Y-m-d', strtotime($editCategoryAd->end_date)) : '' }}">
                    </div>
                    <div class="col-md-6">
                      <input type="time" class="form-control" name="endTime1" placeholder="End Time 1" value="{{ !empty($editCategoryAd->end_date)? date('H:i:s', strtotime($editCategoryAd->end_date)) : '' }}">
                    </div>
                  </div>
    
                  @if ($errors->has('endDate1'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('endDate1') }}
                    </span>
                  @endif

                  @if ($errors->has('endTime1'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('endTime1') }}
                    </span>
                  @endif

                </div>
              </div>

              <div class="col-md-6 mb-10">
                <div class="form-group">
                  <label for="coverImage">Choose Featured Image 1</label>
                  <div class="input-group">
                    <div class="custom-file">
                      {{-- <input type="file" class="custom-file-input" name="coverImage" id="coverImage" accept="image/*"> --}}
                      <input class="custom-file-input" id="coverImage1" data-toggle="modal"
                        data-target="#featuredImageModal" accept="image/*">
                      
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>

                    <div class="input-group-append">
                    </div>
                  </div>
                  @include('backend.partials.ad-media-library-modal.modal')

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

              <div class="col-md-6 mb-10">
                <div class="form-group">
                  <label for="status1">Status 1</label>
                  <select class="form-control" name="status1">
                    <option value="">Select Status</option>
                    <option value="1" {{ !is_null($editCategoryAd)? (($editCategoryAd->status==1)? 'selected' : '') : '' }}>Active</option>
                    <option value="0" {{ !is_null($editCategoryAd)? (($editCategoryAd->status==0)? 'selected' : '') : '' }}>Inactive</option>
                  </select>
    
                  @if ($errors->has('status1'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('status1') }}
                    </span>
                  @endif
                </div>
              </div>

              <div class="col-md-12">
                <div class="col-md-12 pl-0" id="media_image_preview" style="margin-top: 10px;">
                  <img src="{{ !empty($editCategoryAd->image)? asset('images/advertisement/'. $editCategoryAd->image) : '' }}" width="100%">
                </div>
                <div class="col-md-12 pl-0" id="file_image_preview" style="margin-top: 10px;"></div>
              </div>

            </div>
            
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      @if ($editCategoryAd->double_ad == 1)
        <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Advertisement 2</h3>
            </div>
            <div class="card-body">

              <div class="row">
                
                <div class="col-md-4 mb-10">
                  <div class="form-group">
                    <label for="link2">Link 2</label>
                    <input type="text" class="form-control" name="link2" placeholder="Link 2" value="{{ !empty($editCategoryAd)? $editCategoryAd->link_2 : '' }}">
      
                    @if ($errors->has('link2'))
                      <span class="help-block" style="color: #f86c6b;">
                        {{ $errors->first('link2') }}
                      </span>
                    @endif
                  </div>
                </div>

                <div class="col-md-4 mb-10">
                  <div class="form-group">
                    <label for="publishDate2">Publish Date 2</label>

                    <div class="row">
                      <div class="col-md-6">
                        <input type="date" class="form-control" name="publishDate2" placeholder="Publish Date 2" value="{{ !empty($editCategoryAd->publish_date_2)? date('Y-m-d', strtotime($editCategoryAd->publish_date_2)) : '' }}">
                      </div>
                      <div class="col-md-6">
                        <input type="time" class="form-control" name="publishTime2" placeholder="Publish Time 2" value="{{ !empty($editCategoryAd->publish_date_2)? date('H:i:s', strtotime($editCategoryAd->publish_date_2)) : '' }}">
                      </div>
                    </div>
      
                    @if ($errors->has('publishDate2'))
                      <span class="help-block" style="color: #f86c6b;">
                        {{ $errors->first('publishDate2') }}
                      </span>
                    @endif

                    @if ($errors->has('publishTime2'))
                      <span class="help-block" style="color: #f86c6b;">
                        {{ $errors->first('publishDate2') }}
                      </span>
                    @endif

                  </div>
                </div>

                <div class="col-md-4 mb-10">
                  <div class="form-group">
                    <label for="endDate2">End Date 2</label>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <input type="date" class="form-control" name="endDate2" placeholder="End Date 2" value="{{ !empty($editCategoryAd->end_date_2)? date('Y-m-d', strtotime($editCategoryAd->end_date_2)) : '' }}">
                      </div>
                      <div class="col-md-6">
                        <input type="time" class="form-control" name="endTime2" placeholder="End Time 2" value="{{ !empty($editCategoryAd->end_date_2)? date('H:i:s', strtotime($editCategoryAd->end_date_2)) : '' }}">
                      </div>
                    </div>
      
                    @if ($errors->has('endDate2'))
                      <span class="help-block" style="color: #f86c6b;">
                        {{ $errors->first('endDate2') }}
                      </span>
                    @endif

                    @if ($errors->has('endTime2'))
                      <span class="help-block" style="color: #f86c6b;">
                        {{ $errors->first('endTime2') }}
                      </span>
                    @endif

                  </div>
                </div>

                <div class="col-md-6 mb-10">
                  <div class="form-group">
                    <label for="coverImage">Choose Featured Image 2</label>
                    <div class="input-group">
                      <div class="custom-file">
                        {{-- <input type="file" class="custom-file-input" name="coverImage" id="coverImage" accept="image/*"> --}}
                        <input class="custom-file-input" id="coverImage2" data-toggle="modal"
                          data-target="#featuredImageModal2" accept="image/*">
                        
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>

                      <div class="input-group-append2">
                      </div>
                    </div>
                    @include('backend.partials.ad-media-library-modal.modal2')

                    @if ($errors->has('image2'))
                      <span class="help-block error" style="color: #f86c6b;">
                        {{ $errors->first('image2') }}
                      </span>
                    @endif

                    @if ($errors->has('featuredImageFromComp2'))
                      <span class="help-block error" style="color: #f86c6b;">
                        {{ $errors->first('featuredImageFromComp2') }}
                      </span>
                    @endif

                  </div>
                </div>

                <div class="col-md-6 mb-10">
                  <div class="form-group">
                    <label for="status2">Status 2</label>
                    <select class="form-control" name="status2">
                      <option value="">Select Status</option>
                      <option value="1" {{ !is_null($editCategoryAd)? (($editCategoryAd->status_2==1)? 'selected' : '') : '' }}>Active</option>
                      <option value="0" {{ !is_null($editCategoryAd)? (($editCategoryAd->status_2==0)? 'selected' : '') : '' }}>Inactive</option>
                    </select>
      
                    @if ($errors->has('status2'))
                      <span class="help-block" style="color: #f86c6b;">
                        {{ $errors->first('status2') }}
                      </span>
                    @endif
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-12 pl-0" id="media_image_preview2" style="margin-top: 10px;">
                    <img src="{{ !empty($editCategoryAd->image_2)? asset('images/advertisement/'. $editCategoryAd->image_2) : '' }}" width="100%">
                  </div>
                  <div class="col-md-12 pl-0" id="file_image_preview2" style="margin-top: 10px;"></div>
                </div>

              </div>
              
            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->
        </div>
      @else
        <input type="hidden" name="link2">
        <input type="hidden" name="publishDate2">
        <input type="hidden" name="publishTime2">
        <input type="hidden" name="endDate2">
        <input type="hidden" name="endTime2">
        <input type="hidden" name="status2">
        <input type="hidden" name="mediaImage2">
        <input type="hidden" name="fileImage2">
      @endif

      <div class="col-md-12" style="margin-bottom: 10px;">
        <a href="{{ route('backend.dashboard') }}" class="btn btn-primary btn-sm">Cancel</a>
        <input type="submit" value="Update" class="btn btn-success btn-sm float-right">
      </div>

    </div>
  </form>
@endsection

@section('after-script')
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
          $('#file_image_preview').append('<img src="'+ e.target.result +'" width="100%" />');
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    function readImageURL2(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          //clears media image 
          $('#media_image_preview2').empty();
          $(".gallery-image-item2").removeClass("active");
          $("#image2").val('');
          //another section starts
          $('#file_image_preview2').empty();
          $('#file_image_preview2').append('<img src="'+ e.target.result +'" width="100%" />');
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $(document).ready( function(){

      var baseUrl = '{{ url('/') }}';
      
      /* media library script starts */
      $(".gallery-image-item").click(function() {
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

      $('.imagechoose').on('click',function(){
        var value = $(".gallery-image-item.active").attr("data-id");
        $('#image').val(value);
        
        if(value){
          
          var fileUploadImg = $('#fileUpload').val();
          if (fileUploadImg == ''){
            var fileUploadImg = $('#fileUpload').val('');
          }

          $('#file_image_preview > img').remove();

          $('#media_image_preview > img').remove();
          $('#media_image_preview').append('<img src="'+ baseUrl + '/images/advertisement/' + value +'" width="100%"/>');
        }
      });
      /* media library script ends */

      /* media library 2 script starts */
      $(".gallery-image-item2").click(function() {
        if($(this).hasClass('active')){
            $(".gallery-image-item2").removeClass("active");
        }
        else{
          $(".gallery-image-item2").removeClass("active");
          $(this).addClass("active");
        }
        // remove classes from all
        // add class to the one we clicked
      });

      $('.imagechoose2').on('click',function(){
        var value = $(".gallery-image-item2.active").attr("data-id");
        $('#image2').val(value);
        
        if(value){
          
          var fileUploadImg2 = $('#fileUpload2').val();
          if (fileUploadImg2 == ''){
            var fileUploadImg2 = $('#fileUpload2').val('');
          }

          $('#file_image_preview2 > img').remove();

          $('#media_image_preview2 > img').remove();
          $('#media_image_preview2').append('<img src="'+ baseUrl + '/images/advertisement/' + value +'" width="100%"/>');
        }
      });
      /* media library script ends */

    });
  </script>
@endsection