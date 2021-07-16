@extends('frontend.layouts.master')

@section('title', 'Khabar Mukam')

@section('after-head')
	<meta name="keywords" content="{{ !empty($homepageSeo->meta_keyword)? $homepageSeo->meta_keyword : '' }}" />
	<meta name="title" content="{{ !empty($homepageSeo->meta_title)? $homepageSeo->meta_title : '' }}" />
	<meta name="description" content="{{ !empty($homepageSeo->meta_description)? $homepageSeo->meta_description : '' }}" />

	<meta property="og:title" content="{{ !empty($homepageSeo->title)? $homepageSeo->title : '' }}" />
	<meta property="og:description" content="{{ !empty($homepageSeo->description)? substr(strip_tags($homepageSeo->description), 0, 140 ) : '' }}" />
	<meta property="og:image" content="{{ !empty($homepageSeo->image)? asset('images/seo/'. $homepageSeo->image) : asset('images/logo.png') }}" />
	<meta property="og:type" content="homepage" />
	<meta property="og:url" content="{{ url()->current() }}" />

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="{{ !empty($homepageSeo->title)? $homepageSeo->title : '' }}" />
	<meta name="twitter:description" content="{{ !empty($homepageSeo->description)? substr(strip_tags($homepageSeo->description), 0, 140 ) : '' }}" />
	<meta name="twitter:image" content="{{ !empty($homepageSeo->image)? asset('images/seo/'. $homepageSeo->image) : asset('images/logo.png') }}" />
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
@endsection