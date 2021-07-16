@extends('frontend.layouts.master')

@section('title', $searchedKeyword.' - Khabar Mukam')

@section('content')
  <section class="inner-breadcrumb">
    <div class="container-fluid">
        {{-- <div class="inner-bigyapan" style="margin-bottom: 40px;">
            <a href="#"><img src="images/ub-long-2.gif" alt=""></a>
        </div> --}}
        <div class="inner-breacrumb-text ibt-search">
            <ul>
                <li>Search Results : <span>" {{ $searchedKeyword }} "</span></li>
            </ul>
        </div>
    </div>
  </section>

  <section class="inner-search sec-padding">
    <div class="container-fluid">
        <div class="row">
            
            @foreach ($searchedNews as $news)
                <div class="col-lg-4">
                    <div class="main-news-small">
                        <div class="mns-img">
                            <a href="{{ route('frontend.news', [date('Y', strtotime($news->published_date)),
                                date('m', strtotime($news->published_date)), date('d', strtotime($news->published_date)),
                                $news->id]) }}"><img src="{{ asset('images/news/high-quality/'. $news->image) }}" alt=""></a>
                        </div>
                        <div class="mns-text">
                            <h4><a href="{{ route('frontend.news', [date('Y', strtotime($news->published_date)),
                                date('m', strtotime($news->published_date)), date('d', strtotime($news->published_date)),
                                $news->id]) }}">{{ $news->title }}</a></h4>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>

        @if ($searchedNews->total() > $searchedNews->perPage())
            {!! $searchedNews->appends(['keywords' => $searchedKeyword])->links('frontend.partials.paginator') !!}
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
  </section>
@endsection