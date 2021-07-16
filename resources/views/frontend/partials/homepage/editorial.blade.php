<!-- EDITORIAL -->
<section class="main-editorial sec-padding">
    <div class="container-fluid">
        <div class="sec-title">
            <h4>विचार/व्लग </h4>
            <span><a href="#">सबै </a></span>
        </div>
        <div class="row">
            
            @foreach ($bichar as $news)
                <div class="col-lg-3">
                    <div class="main-news-small">
                        <div class="mns-img">
                            <a href="{{ route('frontend.news', [date('Y', strtotime($news->published_date)),
                                date('m', strtotime($news->published_date)), date('d', strtotime($news->published_date)),
                                $news->id]) }}"><img src="{{ !empty($news->image)? asset('images/news/medium-quality/'. $news->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}" alt=""></a>
                        </div>
                        <!-- For Trending news text, makes sure it is only 2 line -->
                        <div class="mns-text">
                            <h4><a href="{{ route('frontend.news', [date('Y', strtotime($news->published_date)),
                                date('m', strtotime($news->published_date)), date('d', strtotime($news->published_date)),
                                $news->id]) }}">{{ Str::words($news->title, 6) }}</a></h4>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

<!-- BIGRYAPAN -->
@foreach ($ads as $ad)

    @if ($ad->slug == 'below-opinion')
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
