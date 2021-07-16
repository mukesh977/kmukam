@extends('backend.layouts.master')

@section('title', 'User | List')

@section('after-head')
	<meta name="_token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('backend/dataTable/jquery.dataTables.min.css')}}">
@endsection

@section('content-header')
	<!-- Content Header (Page header) -->
	<div class="content-header"></div>
	<!-- /.content-header -->
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title"><strong>List Users</strong></h3>

					<div class="card-tools" style="display: flex;">
						<div style="margin-right: 10px;">
							<a href="{{ route('backend.user.create') }}" class="btn btn-primary btn-xs link" title="Add User">Add User</a>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="card-body table-responsive no-padding">
					<table class="table table-hover" id="myTable">
						<thead>
							<tr>
								<th width="25%">Name</th>
								<th width="30%">E-mail</th>
								<th width="15%">Roles</th>
								<th width="15%">Created At</th>
								<th width="15%">Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
			<!-- /.box -->
		</div>
	</div>
@endsection

@section('after-script')
	<script src="{{ asset('backend/dataTable/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('backend/sweetalert/sweetalert.min.js') }}"></script>
	
	<script>
		$(document).ready(function() {

			$('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('backend.user.index') }}",
        columns: [
          { data: 'name', name: 'name' },
          { data: 'email', name: 'email' },
          { data: 'roles', name: 'roles' },
          { data: 'created_at', name: 'created_at' },
          { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
	    });

			$("body").on('click', '.delete', function (e){
				e.preventDefault();
				var deleteId = $(this).data("userid");
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
							url: url +'/admin/user/'+ deleteId,
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