<!-- BUSINESS AND LOKAPRIYA -->
<section class="main-health-crime sec-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="main-health">
                    <div class="sec-title">
                        <h4>अर्थ</h4>
                        <span><a href="{{ route('frontend.category', 'economy') }}">सबै </a></span>
                    </div>
                    <div class="main-health-inner">
                        <div class="row">
                            <div class="col-lg-7">

                                <?php
                                    $countEconomyAndBusiness = $economyAndBusiness->count();
                                    $countFirst = $countEconomyAndBusiness >= 1 ? 1 : $countEconomyAndBusiness;
                                ?>

                                @for ($i = 0; $i < $countFirst; $i++)
                                    <!--<div class="main-news-big"-->
                                    <!--    style="background-image: url({{ !empty($economyAndBusiness[$i]->image)? 'images/news/'. $economyAndBusiness[$i]->image : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }});">-->
                                    <div class="main-news-big"
                                        style="background-image: url('{{ !empty($economyAndBusiness[$i]->image)? 'images/news/'. $economyAndBusiness[$i]->image : 'images/khabarmukam/khabarmukam_not_found_image.jpg' }}');">
                                        <div class="msb-text">
                                            <h4><a href="{{ route('frontend.news', [date('Y', strtotime($economyAndBusiness[$i]->published_date)),
                                                date('m', strtotime($economyAndBusiness[$i]->published_date)), date('d', strtotime($economyAndBusiness[$i]->published_date)),
                                                $economyAndBusiness[$i]->id]) }}">
                                                {{ $economyAndBusiness[$i]->title }}</a></h4>
                                            <ul class="news-meta">
                                                <li><a href="#"><i class="far fa-user-circle"></i>{{ $economyAndBusiness[$i]->author_name }}</a></li>
                                                <li><i class="far fa-clock"></i>{{ getNpDateMonthYear($economyAndBusiness[$i]->published_date) }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endfor

                            </div>
                            <div class="col-lg-5">
                                <div class="main-news-list">
                                    
                                    @for ($i = 1; $i < $countEconomyAndBusiness; $i++)
                                        <div class="mnl-single">
                                            <div class="mnls-img">
                                                <a href="{{ route('frontend.news', [date('Y', strtotime($economyAndBusiness[$i]->published_date)),
                                                    date('m', strtotime($economyAndBusiness[$i]->published_date)), date('d', strtotime($economyAndBusiness[$i]->published_date)),
                                                    $economyAndBusiness[$i]->id]) }}"><img src="{{ !empty($economyAndBusiness[$i]->image)? asset('images/news/'. $economyAndBusiness[$i]->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="mnls-text">
                                                <h4><a href="{{ route('frontend.news', [date('Y', strtotime($economyAndBusiness[$i]->published_date)),
                                                    date('m', strtotime($economyAndBusiness[$i]->published_date)), date('d', strtotime($economyAndBusiness[$i]->published_date)),
                                                    $economyAndBusiness[$i]->id]) }}">{{ $economyAndBusiness[$i]->title }}</a></h4>
                                            </div>
                                        </div>
                                    @endfor
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="main-crime">
                    <div class="sec-title">
                        <h4>लोकप्रिय </h4>
                        <span><a href="{{ route('frontend.content', 'popular') }}">सबै </a></span>
                    </div>
                    <div class="main-news-list">
                        <ul>

                            @foreach ($lokpriya as $news)
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

    @if ($ad->slug == 'below-economy-business')
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
