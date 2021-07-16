@extends('backend.layouts.master')
@section('title', 'Khabarmukam | List Author')

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
		      <i class="fa fa-align-justify"></i> List Author

		      <div class="card-tools" style="display: flex;">
						<div style="margin-right: 10px;">
							<a href="{{ route('backend.author.create') }}" class="btn btn-primary btn-xs" title="Add Author">Add Author</a>
						</div>
					</div>
		    </div>

		    <div class="card-body">
		      <table class="table table-responsive-sm table-sm" id="myTable">
		        <thead>
		          <tr>
		            <th width="25%">Image</th>
		            <th width="20%">Author</th>
		            <th width="10%">Order</th>
		            <th width="15%">Status</th>
		            <th width="15%">Created At</th>
		            <th width="15%">Action</th>
		          </tr>
		        </thead>
		      </table>
	      </div>
		  </div>
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
        order: [2, 'ASC'],
        ajax: "{{ route('backend.author.index') }}",
        columns: [
          { data: 'image', name: 'image', orderable: false, searchable: false },
          { data: 'name', name: 'name' },
          { data: 'order', name: 'order' },
          { data: 'status', name: 'status' },
          { data: 'created_at', name: 'created_at' },
          { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
	    });

			$("body").on('click', '.delete', function (e){
				e.preventDefault();
				var deleteId = $(this).data("authorid");
				console.log(deleteId);
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
							url: url +'/admin/author/'+ deleteId,
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