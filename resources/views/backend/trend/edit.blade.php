@extends('backend.layouts.master')
@section('title', 'Khabarmukam | Add trend')

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Trend</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Edit Trend</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')

<form class="form-horizontal" method="post" action="{{ route('backend.trend.update', $trend->id) }}">
  @csrf
  @method('put')

  <div class="row">

    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Trend</h3>

          <div class="card-tools" style="display: flex;">
            <div style="margin-right: 10px;">
              <a href="{{ route('backend.trend.index') }}" class="btn btn-success btn-xs link" title="List trend">List
                trend</a>
            </div>
          </div>

        </div>
        <div class="card-body">

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title"
                  value="{{ old('title')?old('title'):$trend->title }}">

                @if ($errors->has('title'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('title') }}
                </span>
                @endif
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="slulg">Slug(Page url)</label>
                <input type="text" class="form-control" name="slug" value="{{ old('slug')?old('slug'):$trend->slug }}">

                @if ($errors->has('slulg'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('slulg') }}
                </span>
                @endif
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status">
                  <option value="1" {{ ($trend->title == 1 )?'selected':'' }}>Published</option>
                  <option value="0" {{ ($trend->title == 1 )?'selected':'' }}>Unpublished</option>
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
                <input type="number" class="form-control" name="order" value="{{ old('order')?old('order'):$trend->order }}" min="1" max="100">

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
              <input type="submit" value="Update" class="btn btn-primary btn-sm float-right">
            </div>

          </div>
        </div>

      </div>
      <!-- /.card -->
    </div>
  </div>
</form>

@endsection