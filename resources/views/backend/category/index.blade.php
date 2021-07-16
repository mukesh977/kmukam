<?php  $sn = ($categories->perPage())*(($categories->currentPage())-1); ?>
@extends('backend.layouts.master')
@section('title', 'Khabarmukam | List Category')

@section('after-head')
  <meta name="_token" content="{{ csrf_token() }}">
@endsection

@section('content-header')
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>List Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">List Category</li>
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
          <h3 class="card-title">List Category</h3>

          <div class="card-tools" style="display: flex;">
						<div style="margin-right: 10px;">
							<a href="{{ route('backend.category.create') }}" class="btn btn-success btn-xs link" title="Add Category">Add Category</a>
						</div>
					</div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>S.N</th>
                <th>Name (Nepali)</th>
                <th>Name (English)</th>
                <th>Status</th>
                <th>Order</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach ($categories as $category)
                <tr> 
                  <td>{{ ++$sn }}</td>
                  <td>{{ !empty($category->title_np)? $category->title_np : '' }}</td>
                  <td>{{ !empty($category->title_en)? $category->title_en : '' }}</td>
                  <td>{!! ($category->status==1)? '<button class="btn btn-success btn-xs">Published</button>' : '<button class="btn btn-danger btn-xs">Unpublished</button>' !!}</td>
                  <td>{{ !empty($category->list_order)? $category->list_order : '' }}</td>
                  <td>
                    <a href="{{ route('backend.category.edit', $category->id) }}" class="btn btn-info btn-xs">Edit</a>
                    <a href="" class="btn btn-danger btn-xs delete" data-id="{{ $category->id }}">Delete</a>
                  </td>
                </tr>

                @foreach ($category->subCategories as $index => $subCategory)
                  <tr>
                    <td style="padding-left: 25px;">{{ $sn.'.'. ($index + 1) }}</td>
                    <td style="padding-left: 25px;">--{{ !empty($subCategory->title_np)? $subCategory->title_np : '' }}</td>
                    <td style="padding-left: 25px;">--{{ !empty($subCategory->title_en)? $subCategory->title_en : '' }}</td>
                    <td>{!! ($subCategory->status==1)? '<button class="btn btn-success btn-xs">Published</button>' : '<button class="btn btn-danger btn-xs">Unpublished</button>' !!}</td>
                    <td style="padding-left: 25px;">{{ !empty($subCategory->list_order)? $subCategory->list_order : '' }}</td>
                    <td>
                      <a href="{{ route('backend.category.edit', $subCategory->id) }}" class="btn btn-info btn-xs">Edit</a>
                      <a href="#" class="btn btn-danger btn-xs delete" data-id="{{ $subCategory->id }}">Delete</a>
                    </td>
                  </tr>
                @endforeach

              @endforeach

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->

        @if ($categories->total() > $categories->perPage())
          {!! $categories->links('backend.partials.paginator') !!}
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
            url: url +'/admin/category/'+ deleteId,
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