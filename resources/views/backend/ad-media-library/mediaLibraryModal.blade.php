{{-- modal --}}
<div class="modal" tabindex="-1" id="featuredImageModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="my2Tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="local-2tab" data-toggle="tab" href="#local2" role="tab"
                            aria-controls="local2" aria-selected="true">My Computer</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="media-library-2tab" data-toggle="tab" href="#media-library2" role="tab"
                            aria-controls="media-library2" aria-selected="false">Media
                            Collection</a>
                    </li>
                </ul>
                <div class="tab-content" id="my2TabContent">
                    <div class="tab-pane fade show active" id="local2" role="tabpanel" aria-labelledby="local-2tab">
                        <p class="text-center">
                        <div class="form-group">
                            <input type="file" class="form-control" name="featured_image_from_local" accept="image/*">
                            </span>
                        </div>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="media-library2" role="tabpanel" aria-labelledby="media-library-2tab">
                        @foreach ($images as $image)
                            <li style="width:155px;display:inline-block;margin:5px 0px">
                                <input type="radio" name="featured_image_from_col" value="{{ $image->getFilename() }}" 
                                {{ ($image->getFilename()==$page->image)? 'checked' : '' }} />
                                <img src="{{ asset('images/advertisement/' . $image->getFilename()) }}" width="100">
                            </li>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Select</button>
            </div>
        </div>
    </div>
</div>
