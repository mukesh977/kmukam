<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="featuredImageModal2" tabindex="-1"
role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist"
            style="margin-bottom: 0 !important;">
          <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab2"
                  data-toggle="pill" href="#pills-home2" role="tab"
                  aria-controls="pills-home2" aria-selected="true">Choose from
                  Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab2" data-toggle="pill"
                  href="#pills-profile2" role="tab"
                  aria-controls="pills-profile" aria-selected="false">Choose
                  from PC</a>
          </li>
          <input type="hidden" id="image2" value="{{ old('mediaImage2') }}" name="mediaImage2">
        </ul>

        <button type="button" class="close" data-dismiss="modal"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="gallery-image2">
        <div class="tab-content" id="pills-tabContent2">
          <div class="tab-pane fade show active" id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab" style="max-height: 70vh; overflow-y: scroll;">
            @if($images)
              @foreach($images as $image)
                <img class="gallery-image-item2"
                  src="{{ asset('images/advertisement/'.$image->getFilename()) }}" data-id="{{ $image->getFilename() }}"
                  alt="Gallery Image">
              @endforeach
            @endif
          </div>

          <div class="tab-pane fade" id="pills-profile2" role="tabpanel"
              aria-labelledby="pills-profile-tab">
            <div id="wrapper form-group" style="margin: auto;">
              <input id="fileUpload2" type="file" name="fileImage2" class="form-control" style="height: auto;"
                value="" onchange="readImageURL2(this)"/><br/>
              <div id="image-holder2" class="image-holder2"> </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button"  data-dismiss="modal" class="btn btn-primary imagechoose2">OK</button>
      </div>
    </div>
  </div>
</div>
{{-- model ends --}}