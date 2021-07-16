<?php 
    $countFeaturedNews = $featuredNews->count(); 
    $countFirst = ($countFeaturedNews >= 1)? 1 : $countFeaturedNews;
    $countSecond = (($countFeaturedNews > $countFirst) && ($countFeaturedNews > 3))? 3 : $countFeaturedNews; 
?>

<!-- FEATURED NEWS -->
<section class="main-featured sec-padding" style="margin: 50px 0;">
    <div class="container-fluid">
        <div class="sec-title">
            <h4> फिचर </h4>
            <span><a href="{{ route('frontend.category', 'featured-news') }}">सबै </a></span>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="main-featured-small">

                @for ($i = 1; $i < $countSecond; $i++)
                        <div class="main-featured-single">
                            <div class="mfs-img">
                                <img src="{{ !empty($featuredNews[$i]->image)? asset('images/news/high-quality/'. $featuredNews[$i]->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}" alt="">
                            </div>
                            <div class="mfs-text">
                                <h4><a href="{{ route('frontend.news', [date('Y', strtotime($featuredNews[$i]->published_date)),
                                    date('m', strtotime($featuredNews[$i]->published_date)), date('d', strtotime($featuredNews[$i]->published_date)),
                                    $featuredNews[$i]->id]) }}">{{ $featuredNews[$i]->title }}
                                    </a></h4>
                            </div>
                        </div>
                    @endfor
                        
                </div>
            </div>
            <div class="col-lg-4 mfl">

                @for ($i = 0; $i < $countFirst; $i++)
                    <div class="main-featured-large">
                        <div class="main-featured-single">
                            <div class="mfs-img">
                                <img src="{{ !empty($featuredNews[$i]->image)? asset('images/news/'. $featuredNews[$i]->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}" alt="">
                            </div>
                            <div class="mfs-text">
                                <h4><a href="{{ route('frontend.news', [date('Y', strtotime($featuredNews[$i]->published_date)),
                                    date('m', strtotime($featuredNews[$i]->published_date)), date('d', strtotime($featuredNews[$i]->published_date)),
                                    $featuredNews[$i]->id]) }}">{{ $featuredNews[$i]->title }}
                                    </a></h4>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="col-lg-4">
                <div class="main-featured-small">
                    
                    @for ($i = 3; $i < $countFeaturedNews; $i++)
                        <div class="main-featured-single">
                            <div class="mfs-img">
                                <img src="{{ !empty($featuredNews[$i]->image)? asset('images/news/high-quality/'. $featuredNews[$i]->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}" alt="">
                            </div>
                            <div class="mfs-text">
                                <h4><a href="{{ route('frontend.news', [date('Y', strtotime($featuredNews[$i]->published_date)),
                                    date('m', strtotime($featuredNews[$i]->published_date)), date('d', strtotime($featuredNews[$i]->published_date)),
                                    $featuredNews[$i]->id]) }}">{{ $featuredNews[$i]->title }}
                                    </a></h4>
                            </div>
                        </div>
                    @endfor

                </div>
            </div>
        </div>
    </div>
</section>


<!-- BIGRYAPAN -->
@foreach ($ads as $ad)

    @if ($ad->slug == 'below-feature')
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
