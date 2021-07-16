<?php
  $tab1 = '';
  $tab2 = '';
  $tab3 = '';
  $tab4 = '';
  // $tab5 = '';
  // $tab6 = '';

  foreach ($chooseCategories as $c){
    if ($c->key == 'tab_1'){
      $tab1 = $c->value;
    }

    if ($c->key == 'tab_2'){
      $tab2 = $c->value;
    }

    if ($c->key == 'tab_3'){
      $tab3 = $c->value;
    }

    if ($c->key == 'tab_4'){
      $tab4 = $c->value;
    }

    // if ($c->key == 'tab_5'){
    //   $tab5 = $c->value;
    // }

    // if ($c->key == 'tab_6'){
    //   $tab6 = $c->value;
    // }
  }
?>

@extends('backend.layouts.master')

@section('title', 'Khabarmukam | Choose Category')

@section('content-header')
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Choose Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Choose Category</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('content')
	<form role="form" method="post" action="">
		<div class="row">
      @csrf
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="card card-primary">
	        <div class="card-header">
	          <h3 class="card-title">Choose Category</h3>
	        </div>
	        <!-- /.card-header -->
	        <!-- form start -->

          <div class="card-body">
            
            <div class="row" style="margin-bottom: 10px;">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="layout name">Tab 1</label>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="category">Category</label>
                      <select class="form-control" name="tab1">
                          <option value="">Select Category</option>

                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ !empty($tab1)? (($tab1 == $category->id)? 'selected' : '') : '' }}>{{ $category->title_np }}</option>
                          @endforeach

                      </select>
                  </div>
              </div>
            </div>

            <div class="row" style="margin-bottom: 10px;">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="layout name">Tab 2</label>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="category">Category</label>
                      <select class="form-control" name="tab2">
                          <option value="">Select Category</option>

                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ !empty($tab2)? (($tab2 == $category->id)? 'selected' : '') : '' }}>{{ $category->title_np }}</option>
                          @endforeach

                      </select>
                  </div>
              </div>
            </div>

            <div class="row" style="margin-bottom: 10px;">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="layout name">Tab 3</label>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="category">Category</label>
                      <select class="form-control" name="tab3">
                          <option value="">Select Category</option>

                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ !empty($tab3)? (($tab3 == $category->id)? 'selected' : '') : '' }}>{{ $category->title_np }}</option>
                          @endforeach

                      </select>
                  </div>
              </div>
            </div>

            <div class="row" style="margin-bottom: 10px;">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="layout name">Tab 4</label>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="category">Category</label>
                      <select class="form-control" name="tab4">
                          <option value="">Select Category</option>

                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ !empty($tab4)? (($tab4 == $category->id)? 'selected' : '') : '' }}>{{ $category->title_np }}</option>
                          @endforeach

                      </select>
                  </div>
              </div>
            </div>

            {{-- <div class="row" style="margin-bottom: 10px;">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="layout name">Tab 5</label>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="category">Category</label>
                      <select class="form-control" name="tab5">
                          <option value="">Select Category</option>

                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ !empty($tab5)? (($tab5 == $category->id)? 'selected' : '') : '' }}>{{ $category->title_np }}</option>
                          @endforeach

                      </select>
                  </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="layout name">Tab 6</label>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="category">Category</label>
                      <select class="form-control" name="tab6">
                          <option value="">Select Category</option>

                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ !empty($tab6)? (($tab6 == $category->id)? 'selected' : '') : '' }}>{{ $category->title_np }}</option>
                          @endforeach

                      </select>
                  </div>
              </div>
            </div> --}}

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <div class="col-12" style="margin-bottom: 10px;">
              <input type="submit" value="Update" class="btn btn-primary float-right">
            </div>
          </div>

	      </div>
	      <!-- /.card -->
	    </div>

      
	    
	  </div>
  </form>
@endsection