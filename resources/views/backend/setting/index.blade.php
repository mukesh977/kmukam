@extends('backend.layouts.master')
@section('title', 'Khabarmukam | Setting')

@section('content-header')
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Setting</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Setting</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('content')
	<form role="form" method="post" action="{{ route('backend.setting.store') }}">
		<div class="row">
			@csrf
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="card card-primary">
	        <div class="card-header">
	          <h3 class="card-title">Setting</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>

	        </div>
	        <!-- /.card-header -->
	        <!-- form start -->

          <div class="card-body">
          	<div class="row">

              <div class="col-md-3 mb-30">
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" value="{{ !empty($setting)? $setting->address : '' }}" placeholder="Address">

                  @if ($errors->has('address'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('address') }}
                    </span>
                  @endif
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label for="registrationNumber">Registration Number</label>
                  <input type="text" class="form-control" name="registrationNumber" value="{{ !empty($setting)? $setting->registration_number : '' }}" placeholder="Registration Number">

                  @if ($errors->has('registrationNumber'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('registrationNumber') }}
                    </span>
                  @endif
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label for="executivePublisher">Executive Publisher</label>
                  <input type="text" class="form-control" name="executivePublisher" value="{{ !empty($setting)? $setting->executive_publisher : '' }}" placeholder="Executive Publisher">

                  @if ($errors->has('executivePublisher'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('executivePublisher') }}
                    </span>
                  @endif
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label for="executiveEditor">Executive Editor</label>
                  <input type="text" class="form-control" name="executiveEditor" value="{{ !empty($setting)? $setting->executive_editor : '' }}" placeholder="Executive Editor">

                  @if ($errors->has('executiveEditor'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('executiveEditor') }}
                    </span>
                  @endif
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="youtubeLink">YouTube Link</label>
                  <input type="text" class="form-control" name="youtubeLink" value="{{ !empty($setting)? $setting->youtube_link : '' }}" placeholder="YouTube Link">

                  @if ($errors->has('youtubeLink'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('youtubeLink') }}
                    </span>
                  @endif
                </div>
              </div>
              
            </div>

            <div class="row mb-30">
              <div class="col-md-6">
                
                <label>Phone Number (Office)</label>

                <div class="row mb-15">
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="phoneNumberCompany[]" value="{{ (!$setting->companyContact->isEmpty())? $setting->companyContact[0]->contact_number : '' }}" placeholder="Enter Phone Number">
                  </div>
                  <div class="col-md-1">
                    <a href="" class=" btn btn-default btn-sm link" id="add_phone_number_1">
                      Add
                    </a>
                  </div>
                </div>

                <?php 
                  //$countPhoneNumber = (!$contactUs->contact->isEmpty())? $contactUs->contact->count() : 0;
                  $countPhoneNumber = ((!$setting->companyContact->isEmpty())? $setting->companyContact->count() : '');
                ?>
                <div id="phone_number_field_1">
                  
                  @if( $countPhoneNumber > 1 )
                    @for( $i = 1; $i < $countPhoneNumber; $i++ )
                      <div class="phone_number_field_1">
                        <div class="row mb-15">
                          <div class="col-md-10">
                            <input type="text" class="form-control" name="phoneNumberCompany[]" value="{{ (!$setting->companyContact->isEmpty())? ($setting->companyContact[$i]->contact_number) : '' }}" placeholder="Enter Phone Number">
                          </div>
                          <div class="col-md-1">
                            <a href="" class=" btn btn-default btn-sm link delete_phone_number">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    @endfor
                  @endif
                </div>

                @if ($errors->has('phoneNumberCompany.*'))
                  <span class="help-block" style="color: #f86c6b;">
                    {{ $errors->first('phoneNumber.*') }}
                  </span>
                @endif

              </div>

              <div class="col-md-6">
                
                <label>E-mail (Office)</label>

                <div class="row mb-15">
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="emailCompany[]" value="{{ (!$setting->companyEmail->isEmpty())? $setting->companyEmail[0]->email : '' }}" placeholder="Enter E-mail">
                  </div>
                  <div class="col-md-1">
                    <a href="" class=" btn btn-default btn-sm link" id="add_email_1">
                      Add
                    </a>
                  </div>
                </div>

                <?php 
                  //$countEmail = (!$contactUs->email->isEmpty())? $contactUs->email->count() : 0 
                  $countEmail = ((!$setting->companyEmail->isEmpty())? $setting->companyEmail->count() : '');  
                ?>
                <div id="email_field_1">
                  
                  @if( $countEmail > 1 )
                    @for( $i = 1; $i < $countEmail; $i++ )
                      <div class="email_field_1">
                        <div class="row mb-15">
                          <div class="col-md-10">
                            <input type="text" class="form-control" name="emailCompany[]" value="{{ !empty($setting)? $setting->companyEmail[$i]->email : '' }}" placeholder="Enter E-mail">
                          </div>
                          <div class="col-md-1">
                            <a href="" class=" btn btn-default btn-sm link delete_email">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    @endfor
                  @endif
                </div>

                @if ($errors->has('emailCompany.*'))
                  <span class="help-block" style="color: #f86c6b;">
                    {{ $errors->first('email.*') }}
                  </span>
                @endif

              </div>
              
            </div>

            <div class="row mb-30">
              <div class="col-md-6">
                
                <label>Phone Number (Advertisement)</label>

                <div class="row mb-15">
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="phoneNumberAdvertisement[]" value="{{ (!$setting->advertisementContact->isEmpty())? $setting->advertisementContact[0]->contact_number : '' }}" placeholder="Enter Phone Number">
                  </div>
                  <div class="col-md-1">
                    <a href="" class=" btn btn-default btn-sm link" id="add_phone_number_2">
                      Add
                    </a>
                  </div>
                </div>

                <?php 
                  //$countPhoneNumber = (!$contactUs->contact->isEmpty())? $contactUs->contact->count() : 0;
                  $countPhoneNumber = ((!$setting->advertisementContact->isEmpty())? $setting->advertisementContact->count() : '');
                ?>
                <div id="phone_number_field_2">
                  
                  @if( $countPhoneNumber > 1 )
                    @for( $i = 1; $i < $countPhoneNumber; $i++ )
                      <div class="phone_number_field_2">
                        <div class="row mb-15">
                          <div class="col-md-10">
                            <input type="text" class="form-control" name="phoneNumberAdvertisement[]" value="{{ (!$setting->advertisementContact->isEmpty())? ($setting->advertisementContact[$i]->contact_number) : '' }}" placeholder="Enter Phone Number">
                          </div>
                          <div class="col-md-1">
                            <a href="" class=" btn btn-default btn-sm link delete_phone_number">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    @endfor
                  @endif
                </div>

                @if ($errors->has('phoneNumber.*'))
                  <span class="help-block" style="color: #f86c6b;">
                    {{ $errors->first('phoneNumber.*') }}
                  </span>
                @endif

              </div>

              <div class="col-md-6">
                
                <label>E-mail (Advertisement)</label>

                <div class="row mb-15">
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="emailAdvertisement[]" value="{{ (!$setting->advertisementEmail->isEmpty())? $setting->advertisementEmail[0]->email : '' }}" placeholder="Enter E-mail">
                  </div>
                  <div class="col-md-1">
                    <a href="" class=" btn btn-default btn-sm link" id="add_email_2">
                      Add
                    </a>
                  </div>
                </div>

                <?php 
                  //$countEmail = (!$contactUs->email->isEmpty())? $contactUs->email->count() : 0 
                  $countEmail = ((!$setting->companyEmail->isEmpty())? $setting->advertisementEmail->count() : '');  
                ?>
                <div id="email_field_2">
                  
                  @if( $countEmail > 1 )
                    @for( $i = 1; $i < $countEmail; $i++ )
                      <div class="email_field_2">
                        <div class="row mb-15">
                          <div class="col-md-10">
                            <input type="text" class="form-control" name="emailAdvertisement[]" value="{{ !empty($setting)? $setting->advertisementEmail[$i]->email : '' }}" placeholder="Enter E-mail">
                          </div>
                          <div class="col-md-1">
                            <a href="" class=" btn btn-default btn-sm link delete_email">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    @endfor
                  @endif
                </div>

                @if ($errors->has('email.*'))
                  <span class="help-block" style="color: #f86c6b;">
                    {{ $errors->first('email.*') }}
                  </span>
                @endif

              </div>
              
            </div>

            <div class="row mb-30">
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
                        <input type="text" class="form-control" name="socialMediaName[]" value="{{ (!$setting->socialMedia->isEmpty())? 
                        ($setting->socialMedia[0]->name) : '' }}" placeholder="Social Media Name">
                      </td>

                      <td>
                        <input type="text" class="form-control" name="socialMediaIcon[]" value="{{ (!$setting->socialMedia->isEmpty())? 
                        ($setting->socialMedia[0]->social_media_icon) : '' }}" placeholder="Social Media Icon">
                      </td>
        
                      <td>
                        <input type="text" class="form-control" name="socialMediaLink[]" value="{{ (!$setting->socialMedia->isEmpty())? 
                          ($setting->socialMedia[0]->social_media_link) : '' }}" placeholder="Social Media Link">
                      </td>
        
                      <td>
        
                      </td>
                    </tr>
        
                    <?php 
                      //$countSocialMedia = (!$socialMedias->isEmpty() )? $socialMedias->count() : 0 
                      $countSocialMedia = ((!$setting->socialMedia->isEmpty())? ($setting->socialMedia->count()) : '');
                    ?>
                      
                    @if( $countSocialMedia > 1 )
                      @for( $i = 1; $i < $countSocialMedia; $i++ )
                        <tr>
                          <td>
                            <input type="text" class="form-control" name="socialMediaName[]" value="{{ (!$setting->socialMedia->isEmpty())? 
                            ($setting->socialMedia[$i]->name) : '' }}" placeholder="Social Media Name">
                          </td>

                          <td>
                            <input type="text" class="form-control" name="socialMediaIcon[]" value="{{ (!$setting->socialMedia->isEmpty())? ($setting->socialMedia[$i]->social_media_icon) : '' }}" placeholder="Social Media Icon">
                          </td>
        
                          <td>
                            <input type="text" class="form-control" name="socialMediaLink[]" value="{{ (!$setting->socialMedia->isEmpty())? ($setting->socialMedia[$i]->social_media_link) : '' }}" placeholder="Social Media Link">
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
                  
                  @if ($errors->has('socialMediaIcon.*'))
                    <div class="col-md-3">
                      <span class="help-block" style="color: #f86c6b;">
                        {{ $errors->first('socialMediaIcon.*') }}
                      </span>
                    </div>
                  @endif
        
                  @if ($errors->has('socialMediaLink.*'))
                    <div class="col-md-3">
                      <span class="help-block" style="color: #f86c6b;">
                        {{ $errors->first('socialMediaLink.*') }}
                      </span>
                    </div>
                  @endif
          
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="googleMap">Google Map</label>

                  <textarea class="form-control" name="googleMap" rows="5">{{ !empty($setting)? $setting->google_map : '' }}</textarea>

                  @if ($errors->has('googleMap'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('googleMap') }}
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
      
      <div class="col-12" style="margin-bottom: 10px;">
        <a href="{{ url('/admin/dashboard') }}" class="btn btn-secondary">Cancel</a>
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
          $('#slider_image_preview').empty();
          $('#slider_image_preview').append('<img src="'+ e.target.result +'" width="200px" />');
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $(document).ready(function() {
      $("#coverImage").change(function(){ readCoverImageURL(this); });

      $('#add_phone_number_1').on('click', function(e){
        e.preventDefault();
        $('#phone_number_field_1').append('<div class="phone_number_field_1"><div class="row mb-15"><div class="col-md-10"><input type="text" class="form-control" name="phoneNumberCompany[]" placeholder="Enter Phone Number"></div><div class="col-md-1"><a href="" class=" btn btn-default btn-sm link delete_phone_number"><i class="fas fa-trash-alt"></i></a></div></div></div>');
      });

      $('#add_phone_number_2').on('click', function(e){
        e.preventDefault();
        $('#phone_number_field_2').append('<div class="phone_number_field_2"><div class="row mb-15"><div class="col-md-10"><input type="text" class="form-control" name="phoneNumberAdvertisement[]" placeholder="Enter Phone Number"></div><div class="col-md-1"><a href="" class=" btn btn-default btn-sm link delete_phone_number"><i class="fas fa-trash-alt"></i></a></div></div></div>');
      });

      $('#phone_number_field_1').on('click', '.delete_phone_number', function(e){
        e.preventDefault();
        $(this).parent().closest('.phone_number_field_1').remove();
      });

      $('#phone_number_field_2').on('click', '.delete_phone_number', function(e){
        e.preventDefault();
        $(this).parent().closest('.phone_number_field_2').remove();
      });

      $('#add_email_1').on('click', function(e){
        e.preventDefault();
        $('#email_field_1').append('<div class="email_field_1"><div class="row mb-15"><div class="col-md-10"><input type="text" class="form-control" name="emailCompany[]" placeholder="Enter E-mail"></div><div class="col-md-1"><a href="" class=" btn btn-default btn-sm link delete_email"><i class="fas fa-trash-alt"></i></a></div></div></div>');
      });

      $('#add_email_2').on('click', function(e){
        e.preventDefault();
        $('#email_field_2').append('<div class="email_field_2"><div class="row mb-15"><div class="col-md-10"><input type="text" class="form-control" name="emailAdvertisement[]" placeholder="Enter E-mail"></div><div class="col-md-1"><a href="" class=" btn btn-default btn-sm link delete_email"><i class="fas fa-trash-alt"></i></a></div></div></div>');
      });

      $('#email_field_1').on('click', '.delete_email', function(e){
        e.preventDefault();
        $(this).parent().closest('.email_field_1').remove();
      });

      $('#email_field_2').on('click', '.delete_email', function(e){
        e.preventDefault();
        $(this).parent().closest('.email_field_2').remove();
      });

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
      
    });

  </script>
@endsection