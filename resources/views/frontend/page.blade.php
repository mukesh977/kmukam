@extends('frontend.layouts.master')

@section('title', $page->title.' - Khabar Mukam')

@section('after-head')
  <meta name="keywords" content="{{ $page->meta_keyword }}"/>
  <meta name="title" content="{{ $page->meta_title }}"/>
  <meta name="description" content="{{ $page->meta_description }}"/>
@endsection

@section('content')
  <section class="inner-breadcrumb">
    <div class="container-fluid">
        {{-- <div class="inner-bigyapan" style="margin-bottom: 40px;">
            <a href="#"><img src="images/ub-long-2.gif" alt=""></a>
        </div> --}}
        <div class="inner-breacrumb-text">
            <ul>
                <li class="bread-link"><a href="index.php">गृहपृष्ठ </a></li>
                <li>{{ $page->title }}</li>
            </ul>
        </div>
    </div>
  </section>

  <section class="inner-about sec-padding">
    <div class="container-fluid">
        <div class="sec-title">
            <h4>{{ $page->title }}</h4>
        </div>
        <div class="inner-about-text">
            {!! $page->description !!}
        </div>
    </div>
  </section>
@endsection