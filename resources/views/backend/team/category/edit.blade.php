<?php $sn = ($categories->currentPage()-1)*($categories->perPage()); ?>

@extends('backend.layouts.master')
@section('title', 'Team Category | Create')

@section('content-header')
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Team Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Edit Team Category</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('content')
<form class="form-horizontal" method="post" action="{{ url('/admin/team/category/'.$editCategory->id) }}">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

  	<div class="row">
      
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Team Category</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ !empty($editCategory)? $editCategory->name : '' }}" placeholder="Name">

              @if ($errors->has('name'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('name') }}
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="order">Order</label>
              <input type="number" class="form-control" name="order" value="{{ !empty($editCategory)? $editCategory->order : '' }}" placeholder="Order">

              @if ($errors->has('order'))
                <span class="help-block" style="color: #f86c6b;">
                  {{ $errors->first('order') }}
                </span>
              @endif
            </div>
            
          </div>
					<!-- /.card-body -->
					
					<div class="card-footer">
						<a href="{{ url('/admin/adventure/category') }}" class="btn btn-secondary">Cancel</a>
						<input type="submit" value="Update" class="btn btn-success float-right">
					</div>
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-6">
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">List Team Category</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body">
            
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>S.N</th>
                  <th>Category Name</th>
                  <th>Order</th>
                  <th>Action</th>
                </tr>
        
                @if(!$categories->isEmpty())
                  @foreach( $categories as $category )
        
                  <?php $sn++; ?>
        
                    <tr>
                      <td>{{ $sn }}</td>
                      <td>{{ !empty($category->name)? $category->name : '' }}</td>
                      <td>{{ !empty($category->order)? $category->order : '' }}</td>
                      <td>
                        <a href="{{ url('admin/team/category/'.$category->id.'/edit') }}" class="edit btn btn-success btn-xs" 
                          title="Edit">Edit</i></a>
        
                        @role('admin')
                          <a href="#" class="delete btn btn-danger btn-xs" title="Delete" data-categoryid="{{ $category->id }}" 
                            data-toggle="modal" data-target="#delete">Delete</a>
                        @endrole
                        
                      </td>
                    </tr>
                  @endforeach
                @endif
        
        
              </table>
              
            </div>

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            @if( $categories->total() > $categories->perPage() )
              {{ $categories->links('backend.paginator.paginator') }}
            @else
                <ul class="pagination">
                  <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">&laquo;</a></li>
                  <li class="page-item active" aria-disabled="true"><a class="page-link" href="#">1</a></li>
                  <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            @endif
          </div>
        </div>
        <!-- /.card -->
      </div>

    </div>
	</form>
	
	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete Category</h4>
        </div>
        <form method="POST" action="{{ url('/admin/team/category') }}"> 
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
        <div class="modal-body">
          <p>Are you sure you want to delete this Category ?</p>
          <input type="hidden" name="category_id_delete" id="category_id_delete" value="">
        </div>
        <div class="modal-footer">
  
          <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-success" id="submit" type="submit">Delete</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('after-script')
  <script>
    $(document).ready(function() {

      $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var category_id_delete = button.data('categoryid')
        var modal = $(this)

        modal.find('.modal-body #category_id_delete').val(category_id_delete);
      });

    });
  </script>
@endsection