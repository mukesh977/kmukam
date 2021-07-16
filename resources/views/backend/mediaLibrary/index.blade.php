@extends('backend.layouts.master')

@section('title', 'Media Library')

@section('content-header')
	<div class="content-header"></div>
@endsection

@section('content')
    <form action="{{ route('backend.media-library.bulk-delete') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('delete')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        News Media Library
                        
                        <div class="card-tools" style="display: flex;">
                            <div style="margin-right: 10px;">
                                <a href="{{ route('backend.media-library.create') }}" class="btn btn-success btn-xs mx-2">Add</a>
                                <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">Delete</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="select-all">
                                <label for="select-all" class="custom-control-label">Select All</label>
                            </div>
                        </div>
                        @foreach ($images as $image)
                        <li style="width:155px;display:inline-block;margin:5px 0px">
                            <input type="checkbox" style="margin-right: 10px;" name="images[]" value="{{ $image->getFilename() }}" />
                            <img src="{{ asset('images/news/low-quality/' . $image->getFilename()) }}" width="100">
                        </li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('after-script')
<script>
    $(document).ready(function () { 
    $("#select-all").on('change', function()    {
        if(this.checked){
            $('input[type=checkbox]').each(function()   {
                this.checked = true;
            });
        }else{
            $('input[type=checkbox]').each(function()  {
                this.checked = false;
            });
        }
    });
}); 
</script>
@endsection