<?php 
    $countHighlightedNews = $highlightedNews->count(); 
    $countFirst = ($countHighlightedNews >= 1)? 1 : $countHighlightedNews; 
?>

<!-- LATEST NEWS -->
<section class="main-latest sec-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="main-latest-left">
                    <div class="sec-title">
                        <h4>प्रमुख समाचार </h4>
                        <span><a href="{{ route('frontend.content', 'main-news') }}">सबै </a></span>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">

                            @for ($i = 1; $i < $countHighlightedNews; $i++)
                                <div class="main-news-small">
                                    <div class="mns-img">
                                        <a href="{{ route('frontend.news', [date('Y', strtotime($highlightedNews[$i]->published_date)),
											date('m', strtotime($highlightedNews[$i]->published_date)), date('d', strtotime($highlightedNews[$i]->published_date)),
											$highlightedNews[$i]->id]) }}"><img src="{{ !empty($highlightedNews[$i]->image)? asset('images/news/medium-quality/'. $highlightedNews[$i]->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="mns-text">
                                        <h4><a href="{{ route('frontend.news', [date('Y', strtotime($highlightedNews[$i]->published_date)),
											date('m', strtotime($highlightedNews[$i]->published_date)), date('d', strtotime($highlightedNews[$i]->published_date)),
											$highlightedNews[$i]->id]) }}">{{ $highlightedNews[$i]->title }}</a></h4>
                                    </div>
                                </div>
                            @endfor

                        </div>
                        <div class="col-lg-8">

                            @for ($i = 0; $i < $countFirst; $i++)
                                <div class="main-news-big"
                                    style="background-image: url('{{ !empty($highlightedNews[$i]->image)? 'images/news/'. $highlightedNews[$i]->image : 'images/khabarmukam/khabarmukam_not_found_image.jpg' }}');">
                                    <div class="msb-text">
                                        <h4><a href="{{ route('frontend.news', [date('Y', strtotime($highlightedNews[$i]->published_date)),
											date('m', strtotime($highlightedNews[$i]->published_date)), date('d', strtotime($highlightedNews[$i]->published_date)),
											$highlightedNews[$i]->id]) }}">
                                            {{ $highlightedNews[$i]->title }}</a></h4>
                                        <ul class="news-meta">
                                            <li><a href="{{ route('frontend.author', $highlightedNews[$i]->author->id) }}"><i class="far fa-user-circle"></i>{{ $highlightedNews[$i]->author->name }}</a></li>
                                            <li><i class="far fa-clock"></i>{{ getNpDateMonthYear($highlightedNews[$i]->published_date) }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endfor

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="main-latest-right">
                    <div class="sec-title">
                        <h4>ताजा अपडेट </h4>
                        <span><a href="{{ route('frontend.content', 'latest-update') }}">सबै </a></span>
                    </div>
                    <div class="main-news-list">
                        <ul>
                            
                            <!-- These must be 8, MUST BE -->
                            @foreach ($latestNews as $news)
                                <li><a href="{{ route('frontend.news', [date('Y', strtotime($news->published_date)),
                                    date('m', strtotime($news->published_date)), date('d', strtotime($news->published_date)),
                                    $news->id]) }}">{{ $news->title }}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- BIGRYAPAN -->
@foreach ($ads as $ad)

    @if ($ad->slug == 'below-highlighted-news')
        <div class="main-bigyapan">
            <div class="container-fluid">
                <div class="row">
                    
                    @if (($ad->status == 1) && ($ad->status_2 == 1))
                        @if (validateDate($today, $ad->publish_date, $ad->end_date, $ad->publish_date_2, $ad->end_date_2))
                            <div class="col-md-6">
                                <a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                            </div>

                            <div class="col-md-6">
                                <a href="{{ $ad->link_2 }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
                            </div>
                        @else
                            @if (validateSingleDate($today, $ad->publish_date, $ad->end_date))
                                <div class="col-md-12">
                                    <a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                                </div>
                            @elseif (validateSingleDate($today, $ad->publish_date_2, $ad->end_date_2))
                                <div class="col-md-12">
                                    <a href="{{ $ad->link_2 }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
                                </div>
                            @endif
                        @endif
                    @elseif (($ad->status == 1) && ($ad->status_2 == 0))
                        @if (validateSingleDate($today, $ad->publish_date, $ad->end_date))
                            <div class="col-md-12">
                                <a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                            </div>
                        @endif
                    @elseif (($ad->status == 0) && ($ad->status_2 == 1))
                        @if (validateSingleDate($today, $ad->publish_date_2, $ad->end_date_2))
                            <div class="col-md-12">
                                <a href="{{ $ad->link_2 }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
                            </div>
                        @endif
                    @endif
                        
                </div>
            </div>
        </div>
        
        <?php break; ?>
    @endif
@endforeach
