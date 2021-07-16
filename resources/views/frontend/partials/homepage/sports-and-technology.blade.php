<!-- SPORTS AND TECHNOLOGY -->
<section class="main-sport-technology sec-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="main-sport">
                    <div class="sec-title">
                        <h4>खेल</h4>
                        <span><a href="{{ route('frontend.category', 'sports') }}">सबै </a></span>
                    </div>
                    <div class="main-sport-inner">
                        <div class="row">
                            <div class="col-lg-4">

                                <?php 
                                    $countSports = $sports->count(); 
                                    $countFirst = ($countSports >= 1)? 1 : $countSports; 
                                ?>

                                @for ($i = 1; $i < $countSports; $i++)
                                    <div class="main-news-small">
                                        <div class="mns-img">
                                            <a href="{{ route('frontend.news', [date('Y', strtotime($sports[$i]->published_date)),
                                                date('m', strtotime($sports[$i]->published_date)), date('d', strtotime($sports[$i]->published_date)),
                                                $sports[$i]->id]) }}"><img src="{{ !empty($sports[$i]->image)? asset('images/news/medium-quality/'. $sports[$i]->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="mns-text">
                                            <h4><a href="{{ route('frontend.news', [date('Y', strtotime($sports[$i]->published_date)),
                                                date('m', strtotime($sports[$i]->published_date)), date('d', strtotime($sports[$i]->published_date)),
                                                $sports[$i]->id]) }}">{{ $sports[$i]->title }}</a></h4>
                                        </div>
                                    </div>
                                @endfor
                                
                            </div>
                            <div class="col-lg-8">
                                
                                @for ($i = 0; $i < $countFirst; $i++)
                                    <div class="main-news-big"
                                        style="background-image: url('{{ !empty($sports[$i]->image)? 'images/news/'. $sports[$i]->image : 'images/khabarmukam/khabarmukam_not_found_image.jpg' }}');">
                                        <div class="msb-text">
                                            <h4><a href="{{ route('frontend.news', [date('Y', strtotime($sports[$i]->published_date)),
                                                date('m', strtotime($sports[$i]->published_date)), date('d', strtotime($sports[$i]->published_date)),
                                                $sports[$i]->id]) }}">
                                                {{ $sports[$i]->title }}</a>
                                            </h4>
                                            <ul class="news-meta">
                                                <li><a href="#"><i class="far fa-user-circle"></i>{{ $sports[$i]->author_name }}</a></li>
                                                <li><i class="far fa-clock"></i>{{ getNpDateMonthYear($sports[$i]->published_date) }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endfor

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="main-technology">
                    <div class="sec-title">
                        <h4>प्रविधि </h4>
                        <span><a href="{{ route('frontend.category', 'technology') }}">सबै </a></span>
                    </div>

                    <?php 
                        $countTechnology = $technology->count(); 
                        $countFirst = ($countTechnology >= 1)? 1 : $countTechnology; 
                    ?>

                    @for ($i = 0; $i < $countFirst; $i++)
                        <div class="main-news-small">
                            <div class="mns-img">
                                <a href="{{ route('frontend.news', [date('Y', strtotime($technology[$i]->published_date)),
                                    date('m', strtotime($technology[$i]->published_date)), date('d', strtotime($technology[$i]->published_date)),
                                    $technology[$i]->id]) }}"><img src="{{ !empty($technology[$i]->image)? asset('images/news/medium-quality/'. $technology[$i]->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}" alt=""></a>
                            </div>
                            <div class="mns-text">
                                <h4><a href="{{ route('frontend.news', [date('Y', strtotime($technology[$i]->published_date)),
                                    date('m', strtotime($technology[$i]->published_date)), date('d', strtotime($technology[$i]->published_date)),
                                    $technology[$i]->id]) }}">{{ $technology[$i]->title }}</a></h4>
                            </div>
                        </div>
                    @endfor

                    <div class="main-news-list">
                        <ul>

                            @for ($i = 1; $i < $countTechnology; $i++)
                                <li><a href="{{ route('frontend.news', [date('Y', strtotime($technology[$i]->published_date)),
                                    date('m', strtotime($technology[$i]->published_date)), date('d', strtotime($technology[$i]->published_date)),
                                    $technology[$i]->id]) }}">{{ $technology[$i]->title }}ढी</a></li>
                            @endfor

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- BIGRYAPAN -->
@foreach ($ads as $ad)

    @if ($ad->slug == 'below-sports')
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
