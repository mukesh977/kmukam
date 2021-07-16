@extends('backend.layouts.master')
@section('title', 'Khabarmukam | Page')

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
          <h1>Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<div class="card">
		    <div class="card-header">
		      <i class="fa fa-align-justify"></i> List Page

		      <div class="card-tools" style="display: flex;">
						<div style="margin-right: 10px;">
							<a href="{{ route('backend.page.create') }}" class="btn btn-primary btn-xs" title="Add Page">Add Page</a>
						</div>
					</div>
		    </div>

		    <div class="card-body">
		      <table class="table table-responsive-sm table-sm" id="myTable">
		        <thead>
		          <tr>
		            <th width="20%">Title</th>
		            <th width="35%">Description</th>
		            <th width="15%">Created At</th>
		            <th width="15%">Action</th>
		          </tr>
		        </thead>
		      </table>
	      </div>
		  </div>
		</div>
	</div>
	
	</div>
	<!-- /.modal-->
     
@endsection

@section('after-script')
	<script src="{{ asset('backend/dataTable/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('backend/sweetalert/sweetalert.min.js') }}"></script>
	<script>
		$(document).ready(function() {

			$('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('backend.page.index') }}",
        columns: [
          { data: 'title', name: 'title' },
          { data: 'description', name: 'description' },
          { data: 'created_at', name: 'created_at' },
          { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
	    });

			$("body").on('click', '.delete', function (e){
				e.preventDefault();
				var deleteId = $(this).data("pageid");
				
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

						console.log('test');
						$.ajax({
							type: "delete",
							url: url +'/admin/page/'+ deleteId,
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