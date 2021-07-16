@extends('frontend.layouts.master')

@section('title', $author->name. ' - Khabar Mukam')

@section('content')
  <section class="inner-breadcrumb">
    <div class="container-fluid">
        {{-- <div class="inner-bigyapan" style="margin-bottom: 40px;">
            <a href="#"><img src="images/ub-long-2.gif" alt=""></a>
        </div> --}}
        <div class="inner-breacrumb-text">
            <ul>
                <li class="bread-link"><a href="{{ route('frontend.home') }}">गृहपृष्ठ </a></li>
                <li>{{ $author->name }}</li>
            </ul>
        </div>
    </div>
  </section>

  <section class="inner-author sec-padding">
    <div class="container-fluid">
        <div class="inner-author-details">
            <div class="row">
                <div class="col-lg-3">
                    <div class="iad-img">
                        <img src="{{ asset('images/author/'. $author->image) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-9 iaddd">
                    <div class="iad-details">
                        <h4>{{ $author->name }}</h4>
                        <span>{{ $author->designation }}</span>
                        <span>{{ $author->email }}</span>
                        <ul>

                            @foreach ($author->socialMedia as $socialMedia)
                                <li><a href="{{ $socialMedia->social_media_link }}" target="_blank"><i class="{{ $socialMedia->social_media_icon }}"></i></a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="inner-author-posts">
            <div class="sec-title">
                <h4>लेखहरु </h4>
            </div>
            <div class="row">
                
				@foreach ($news as $n)
					<div class="col-lg-4">
						<div class="main-news-small">
							<div class="mns-img">
								<a href="{{ route('frontend.news', [date('Y', strtotime($n->published_date)),
									date('m', strtotime($n->published_date)), date('d', strtotime($n->published_date)),
									$n->id]) }}"><img src="{{ asset('images/news/high-quality/'. $n->image) }}" alt=""></a>
							</div>
							<div class="mns-text">
								<h4><a href="{{ route('frontend.news', [date('Y', strtotime($n->published_date)),
									date('m', strtotime($n->published_date)), date('d', strtotime($n->published_date)),
									$n->id]) }}">{{ $n->title }}</a></h4>
							</div>
						</div>
					</div>
				@endforeach
                
            </div>
            
			@if ($news->total() > $news->perPage())
				{!! $news->links('frontend.partials.paginator') !!}
			@else
				<div class="inner-pagination">
					<div class="pagination">
						<a>&lsaquo;&lsaquo;</a>
						<a class="active">1</a>
						<a>&rsaquo;&rsaquo;</a>
					</div>
				</div>
			@endif

        </div>
    </div>
  </section>
@endsection