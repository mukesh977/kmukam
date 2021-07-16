<?php  $sn = ($trends->perPage())*(($trends->currentPage())-1); ?>
@extends('backend.layouts.master')
@section('title', 'Khabarmukam | List Trend')

@section('after-head')
<meta name="_token" content="{{ csrf_token() }}">
@endsection

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>List Trend</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">List Trend</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">List Trend</h3>

        <div class="card-tools" style="display: flex;">
          <div style="margin-right: 10px;">
            <a href="{{ route('backend.trend.create') }}" class="btn btn-success btn-xs link" title="Add Trend">Add
              Trend</a>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>S.N</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Status</th>
              <th>Order</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($trends as $trend)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $trend->title }}</td>
              <td>{{ $trend->slug }}</td>
              <td>
                {!! ($trend->status == 1)?'<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Off</span>' !!}
              </td>
              <td>{{ $trend->order }}</td>
              <td>
                <a href="{{ route('backend.trend.edit', $trend->id) }}" class="btn btn-info btn-xs">Edit</a>
                <a href="" class="btn btn-danger btn-xs delete" data-id="{{ $trend->id }}">Delete</a>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
      <!-- /.card-body -->

      @if ($trends->total() > $trends->perPage())
      {!! $trends->links('backend.partials.paginator') !!}
      @else
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          <li class="page-item"><a class="page-link" href="#">«</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
      </div>
      @endif

    </div>
    <!-- /.card -->

  </div>
</div>

@endsection

@section('after-script')
<script src="{{ asset('backend/sweetalert/sweetalert.min.js') }}"></script>
<script>
  $("body").on('click', '.delete', function (e){
      e.preventDefault();
      var deleteId = $(this).data("id");
      var url = '{{ url('/') }}';
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
    
      .then((willDelete) => {
        
        if (willDelete) {
          var data = {
            "_token": $('meta[name="_token"]').attr('content'),
            "id": deleteId,
          };

          $.ajax({
            type: "delete",
            url: url +'/admin/trend/'+ deleteId,
            data: data,
            success: function (response){
              swal(response.status, {
              icon: "success",
              })
              .then((result) => {
                console.log(result);
                location.reload();
              });
            },
          });
          
        } else {
          swal("Your imaginary file is safe!");
        }
      });
    });
</script>
@endsection