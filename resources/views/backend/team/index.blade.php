@extends('backend.layouts.master')
@section('title', 'Team | List')

@section('after-head')
	<meta name="_token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('backend/dataTable/jquery.dataTables.min.css')}}">
@endsection

@section('content-header')
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>List Team</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">List Team</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('content')
	<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Team</h3>

      <div class="card-tools" style="display: flex;">
        <div style="margin-right: 10px;">
          <a href="{{ url('/admin/team/create') }}" class="btn btn-success btn-xs" title="Add Team">Add Team</a>
        </div>
      </div>
    </div>

    <div class="card-body">
              
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Image</th>
            <th>Order</th>
            <th>Action</th>
          </tr>

          <?php $sn = 1; ?>

          @if(!$categories->isEmpty())
            @foreach( $categories as $index1 => $category )
              <tr>
                <td><b>{{ $index1 + 1 }}</b></td>
                <td><b>{{ $category->name }}</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>

              @foreach ($category->team as $index2 => $team)
                <tr>
                  <td style="padding-left: 35px;">{{ ($index1 + 1) .'.'. ($index2 + 1) }}</td>
                  <td style="padding-left: 35px;">{{ !empty($team->name)? $team->name : '' }}</td>
                  <td>{{ !empty($team->designation)? $team->designation : '' }}</td>
                  <td><img src="{{ !empty($team)? asset('images/team/'. $team->featured_image) : '' }}" width="100px"></td>
                  <td>{{ !empty($team->order)? $team->order : '' }}</td>
                  <td>
                    <a href="{{ url('/admin/team/'.$team->id.'/edit') }}" class="edit btn btn-success btn-xs" 
                      title="Edit">Edit</i></a>

                    @role('admin')
                      <a href="#" class="delete btn btn-danger btn-xs" title="Delete" data-teamid="{{ $team->id }}">Delete</a>
                    @endrole
                    
                  </td>
                </tr>
              @endforeach
            @endforeach
          @endif


        </table>
        
      </div>

    </div>
    <!-- /.card-body -->

  </div>
@endsection

@section('after-script')
  <script src="{{ asset('backend/dataTable/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/sweetalert/sweetalert.min.js') }}"></script>
  <script>
    $(document).ready(function() {

      $("body").on('click', '.delete', function (e){
        e.preventDefault();
        var deleteId = $(this).data("teamid");
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
              url: url +'/admin/team/'+ deleteId,
              data: data,
              success: function (response){
                swal(response.status, {
                icon: "success",
                })
                .then((result) => {
                  location.reload();
                });
              },
            });
            
          } else {
            swal("Your imaginary file is safe!");
          }
        });
      });

    });
  </script>
@endsection
