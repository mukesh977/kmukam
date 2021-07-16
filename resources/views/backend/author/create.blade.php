@extends('backend.layouts.master')

@section('title', 'Khabarmukam | Add Author')

@section('content-header')
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Author</h1>
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
	<form role="form" method="post" action="{{ route('backend.author.store') }}" enctype="multipart/form-data">
		<div class="row">
			@csrf
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="card card-primary">
	        <div class="card-header">
	          <h3 class="card-title">Author</h3>

            <div class="card-tools" style="display: flex;">
              <div style="margin-right: 30px;">
                <a href="{{ route('backend.author.index') }}" class="btn btn-success btn-xs" title="List Feature">List Author</a>
              </div>
            </div>

	        </div>
	        <!-- /.card-header -->
	        <!-- form start -->

          <div class="card-body">
            
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="authorName">Author Name</label>
                  <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    
                  @if ($errors->has('name'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('name') }}
                    </span>
                  @endif
    
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="designation">Designation</label>
                  <input type="text" class="form-control" name="designation" value="{{ old('designation') }}">
                    
                  @if ($errors->has('designation'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('designation') }}
                    </span>
                  @endif
    
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    
                  @if ($errors->has('email'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('email') }}
                    </span>
                  @endif
    
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="order">Order</label>
                  <input type="text" class="form-control" name="order" value="{{ old('order') }}">
                    
                  @if ($errors->has('order'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('order') }}
                    </span>
                  @endif
    
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" name="status">
                    <option value="">Select Status</option>
                    <option value="1" {{ !is_null(old('status'))? ((old('status')==1)? 'selected' : '') : '' }}>Active</option>
                    <option value="0" {{ !is_null(old('status'))? ((old('status')==0)? 'selected' : '') : '' }}>Inactive</option>
                  </select>
                    
                  @if ($errors->has('status'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('status') }}
                    </span>
                  @endif
    
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="image">Choose Image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="image" id="image" accept="image/*">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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
                    <img src="" width="200px" />
                  </div>
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-md-12">
                <table class="table table-responsive-sm table-bordered" id="aq_table">
                  <thead>
                    <tr>
                      <th width="30%">Name</th>
                      <th width="34%">Social Media Icon</th>
                      <th width="34%">Socail Media Link</th>
                      <th width="2%">
                        <a href="#" class="btn btn-sm btn-primary add_aq" title="Add Fields">+</a>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="tableService">
                    <tr>
                      <td>
                        <input type="text" class="form-control" name="socialMediaName[]" value="{{ !empty(old('socialMediaName'))? old('socialMediaName.0') : '' }}" placeholder="Social Media Name">
                      </td>

                      <td>
                        <input type="text" class="form-control" name="socialMediaIcon[]" value="{{ !empty(old('socialMediaIcon'))? old('socialMediaIcon.0') : '' }}" placeholder="Social Media Icon">
                      </td>
        
                      <td>
                        <input type="text" class="form-control" name="socialMediaLink[]" value="{{ !empty(old('socialMediaLink'))? old('socialMediaLink.0') : '' }}" placeholder="Social Media Link">
                      </td>
        
                      <td>
        
                      </td>
                    </tr>
        
                    <?php 
                      //$countSocialMedia = (!$socialMedias->isEmpty() )? $socialMedias->count() : 0 
                      $countSocialMedia = !empty(old('socialMediaName'))? count(old('socialMediaName')) : '';
                    ?>
                      
                    @if( $countSocialMedia > 1 )
                      @for( $i = 1; $i < $countSocialMedia; $i++ )
                        <tr>
                          <td>
                            <input type="text" class="form-control" name="socialMediaName[]" value="{{ !empty(old('socialMediaName'))? old('socialMediaName.'. $i) : '' }}" placeholder="Social Media Name">
                          </td>

                          <td>
                            <input type="text" class="form-control" name="socialMediaIcon[]" value="{{ !empty(old('socialMediaIcon'))? old('socialMediaIcon.'. $i) : '' }}" placeholder="Social Media Icon">
                          </td>
        
                          <td>
                            <input type="text" class="form-control" name="socialMediaLink[]" value="{{ !empty(old('socialMediaLink'))? old('socialMediaLink.'. $i) : '' }}" placeholder="Social Media Link">
                          </td>
        
                          <td>
                            <a href="#" class="link delete_aq" title="Delete"">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </td>
                        </tr>
                      @endfor
                    @endif
        
                  </tbody>
                </table>
        
                <div class="row">
                  @if ($errors->has('socialMediaName.*'))
                    <div class="col-md-4">
                      <span class="help-block" style="color: #f86c6b;">
                        {{ $errors->first('socialMediaName.*') }}
                      </span>
                    </div>
                  @endif

                  @if ($errors->has('socialMediaIcon.*'))
                    <div class="col-md-4">
                      <span class="help-block" style="color: #f86c6b;">
                        {{ $errors->first('socialMediaIcon.*') }}
                      </span>
                    </div>
                  @endif
        
                  @if ($errors->has('socialMediaLink.*'))
                    <div class="col-md-4">
                      <span class="help-block" style="color: #f86c6b;">
                        {{ $errors->first('socialMediaLink.*') }}
                      </span>
                    </div>
                  @endif
          
                </div>
              </div>
            </div>

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <div class="col-12" style="margin-bottom: 10px;">
              <input type="submit" value="Add" class="btn btn-sm btn-primary float-right">
            </div>
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
      
      //script for social media
      var field = $('#aq_table').find('tbody');
      
      $('.add_aq').on('click', function(e){
        e.preventDefault();
        $(field).append('<tr><td><input type="text" class="form-control" name="socialMediaName[]" placeholder="Social Media Name"></td><td><input type="text" class="form-control" name="socialMediaIcon[]" value="" placeholder="Social Media Icon"></td><td><input type="text" class="form-control" name="socialMediaLink[]" value="" placeholder="Social Media Link"></td><td><a href="#" class="link delete_aq" title="Delete""><i class="fas fa-trash-alt"></i></a></td</tr>');
      });

      $(field).on('click', '.delete_aq', function(e){
        e.preventDefault();
        $(this).parent().closest('tr').remove();
      });
      //script end for social media

    });

  </script>
@endsection