@extends('backend.layouts.master')
@section('title', 'Khabarmukam | Add Category')

@section('content-header')
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Add Category</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('content')
	
  <form class="form-horizontal" method="post" action="{{ route('backend.category.store') }}">
    @csrf

  	<div class="row">
      
      <div class="col-md-8">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Category</h3>

            <div class="card-tools" style="display: flex;">
              <div style="margin-right: 10px;">
                <a href="{{ route('backend.category.index') }}" class="btn btn-success btn-xs link" title="List Category">List Category</a>
                <a href="{{ route('backend.category.create') }}" class="btn btn-success btn-xs link" title="Add Category">Add Category</a>
              </div>
            </div>

          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nepaliTitle">Title (in Nepali)</label>
                  <input type="text" class="form-control" name="nepaliTitle">
    
                  @if ($errors->has('nepaliTitle'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('nepaliTitle') }}
                    </span>
                  @endif
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="englishTitle">Title (in English)</label>
                  <input type="text" class="form-control" name="englishTitle" value="{{ old('englishTitle') }}">
    
                  @if ($errors->has('englishTitle'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('englishTitle') }}
                    </span>
                  @endif
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="category">Select Category *</label>
                  <select class="form-control" name="category">
                    <option value="">Select Category *</option>
    
                    <optgroup label="Select as Main Category">
                      <option value="0">Main Category</option>
                    </optgroup>
                    <optgroup label="Select as category of this">
                      @foreach ($categories as $category)
                        <option value="{{ $category->id  }}">{{ $category->title_np }}</option>
                      @endforeach
                    </optgroup>
    
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
                  <label for="status">Status</label>
                  <select class="form-control" name="status">
                    <option value="">Select Status</option>
                    <option value="1">Published</option>
                    <option value="0">Unpublished</option>
                  </select>
    
                  @if ($errors->has('status'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('status') }}
                    </span>
                  @endif
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="order">Order</label>
                  <input type="number" class="form-control" name="order" value="{{ old('order') }}">
    
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
      <div class="col-md-4">
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">SEO</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body">
            
            <div class="row">
              <div class="col-md-12">
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
        </div>
        <!-- /.card -->
      </div>

    </div>
  </form>

@endsection