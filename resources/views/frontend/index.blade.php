@extends('frontend.layouts.master')

@section('title', 'Khabar Mukam')

@section('after-head')
<meta name="keywords" content="{{ !empty($homepageSeo->meta_keyword)? $homepageSeo->meta_keyword : '' }}" />
<meta name="title" content="{{ !empty($homepageSeo->meta_title)? $homepageSeo->meta_title : '' }}" />
<meta name="description" content="{{ !empty($homepageSeo->meta_description)? $homepageSeo->meta_description : '' }}" />

<meta property="og:title" content="{{ !empty($homepageSeo->title)? $homepageSeo->title : '' }}" />
<meta property="og:description"
  content="{{ !empty($homepageSeo->description)? substr(strip_tags($homepageSeo->description), 0, 140 ) : '' }}" />
<meta property="og:image"
  content="{{ !empty($homepageSeo->image)? asset('images/seo/'. $homepageSeo->image) : asset('images/logo.png') }}" />
<meta property="og:type" content="homepage" />
<meta property="og:url" content="{{ url()->current() }}" />

<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="{{ !empty($homepageSeo->title)? $homepageSeo->title : '' }}" />
<meta name="twitter:description"
  content="{{ !empty($homepageSeo->description)? substr(strip_tags($homepageSeo->description), 0, 140 ) : '' }}" />
<meta name="twitter:image"
  content="{{ !empty($homepageSeo->image)? asset('images/seo/'. $homepageSeo->image) : asset('images/logo.png') }}" />
@endsection

@section('content')
@include('frontend.partials.homepage.breaking-news')
@include('frontend.partials.homepage.latest-news')
@include('frontend.partials.homepage.samachar')
@include('frontend.partials.homepage.trending-news')
@include('frontend.partials.homepage.politics')
@include('frontend.partials.homepage.susaasan')
@include('frontend.partials.homepage.business-and-lokpriya')
@include('frontend.partials.homepage.pradesh')
@include('frontend.partials.homepage.samaj')
@include('frontend.partials.homepage.local-governance')
@include('frontend.partials.homepage.subaltern')
@include('frontend.partials.homepage.featured-news')
@include('frontend.partials.homepage.editorial')
@include('frontend.partials.homepage.art')
@include('frontend.partials.homepage.sports-and-technology')
@include('frontend.partials.homepage.foreign')
@include('frontend.partials.homepage.videos')
@include('frontend.partials.homepage.category-news')



<!-- MODAL -->
<div class="modal notice-modal" tabindex="-1" id="myModal">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(isset($popop_ad))
            <img src="{{ asset('images/advertisement/'. $popop_ad->image) }}" class="img-fluid" alt="Responsive image">       
        @endif
      </div>
      <!--<div class="modal-footer">-->
         <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        
      <!--  <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
@endsection


@section('after-script')
<script>
  $( document ).ready(function() {
    // console.log( "ready!" );
    @if( isset($popop_ad) ){
    @if (($popop_ad->status == 1) && validateSingleDate($today, $popop_ad->publish_date, $popop_ad->end_date))
    $('#myModal').modal('show')
    @endif
    @endif
    }
  });
</script>
@endsection