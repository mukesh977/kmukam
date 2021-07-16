@extends('backend.layouts.master')

@section('title', 'List category advertisement')

@section('after-head')
	<meta name="_token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('backend/dataTable/jquery.dataTables.min.css') }}">
@endsection

@section('content-header')
	<!-- Content Header (Page header) -->
	<div class="content-header"></div>
	<!-- /.content-header -->
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title"><strong>List Category Advertisement</strong></h3>
				</div>
				<!-- /.box-header -->
				<div class="card-body table-responsive no-padding">
					<table class="table table-hover" id="myTable">
						<thead>
							<tr>
								<th width="5%">S.N</th>
								<th width="15%">Title</th>
								<th width="15%">Position</th>
								<th width="5%">Image 1</th>
								<th width="10%">Publish Date 1</th>
								<th width="10%">End Date 1</th>
								<th width="5%">Image 2</th>
								<th width="10%">Publish Date 2</th>
								<th width="10%">End Date 2</th>
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
        ajax: "{{ route('backend.category-advertisement.index') }}",
        columns: [
          { data: 'DT_RowIndex' },
          { data: 'title', name: 'title' },
          { data: 'position', name: 'position' },
          { data: 'image', name: 'image' },
          { data: 'publish_date', name: 'publish_date' },
          { data: 'end_date', name: 'end_date' },
					{ data: 'image_2', name: 'image_2' },
          { data: 'publish_date_2', name: 'publish_date_2' },
          { data: 'end_date_2', name: 'end_date_2' },
          { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
	    });

			$("body").on('click', '.delete', function (e){
				e.preventDefault();
				var deleteId = $(this).data("advertisementid");
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
							url: url +'/admin/category-advertisement/'+ deleteId,
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