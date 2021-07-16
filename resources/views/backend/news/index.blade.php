@extends('backend.layouts.master')

@section('title', 'Khabarmukam | List News')

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
					<h3 class="card-title"><strong>List News</strong></h3>

					<div class="card-tools" style="display: flex;">
						<div style="margin-right: 10px;">
							<a href="{{ route('backend.news.create') }}" class="btn btn-primary btn-xs link" title="Add News">Add News</a>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="card-body table-responsive no-padding">
					<table class="table table-hover" id="myTable">
						<thead>
							<tr>
								<th width="5%">S.N</th>
								<th width="5%">Image</th>
								<th width="33%">Title</th>
								<th width="18%">Category</th>
								<th width="4">Views</th>
                <th width="12%">Published Date</th>
                <th width="8%">Status</th>
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
				order: [5, 'DESC'],
        ajax: "{{ route('backend.news.index') }}",
        columns: [
          { data: 'DT_RowIndex' },
          { data: 'image', name: 'image' },
          { data: 'title', name: 'title' },
          { data: 'category', name: 'category' },
          { data: 'view_count', name: 'view_count' },
          { data: 'published_date', name: 'published_date' },
          { data: 'status', name: 'status' },
          { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
	    });

			$("body").on('click', '.delete', function (e){
				e.preventDefault();
				var deleteId = $(this).data("newsid");
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
							url: url +'/admin/news/'+ deleteId,
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