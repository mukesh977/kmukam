@extends('frontend.layouts.master')

@section('title', $news->title)

@section('before-header')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=427211038498186&autoLogAppEvents=1"
    nonce="lZ6wfTNZ"></script>
<script type='text/javascript'
    src='https://platform-api.sharethis.com/js/sharethis.js#property=60324ca2b7ebd200116dff58&product=inline-share-buttons'
    async='async'></script>
@endsection

@section('before-head')
<meta property="og:site_name" content="KhabarMukam">
<meta property="fb:app_id" content="427211038498186">
<meta property="og:title" content="{{ !empty($news->title)? $news->title : '' }}" />
<meta property="og:description"
    content="{{ !empty($news->caption)? Str::words(strip_tags($news->caption), 20) : '' }}" />
<meta property="og:image"
    content="{{ !empty($news->image)? asset('images/news/'. $news->image) : asset('images/khabarmukam/khabarmukam_fb_image.jpg') }}" />
<meta property="og:type" content="news" />
<meta property="og:url" content="{{ url()->current() }}" />

<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="{{ !empty($news->title)? $news->title : '' }}" />
<meta name="twitter:description"
    content="{{ !empty($news->caption)? Str::words(strip_tags($news->caption), 20) : '' }}" />
<meta name="twitter:image"
    content="{{ !empty($news->image)? asset('images/news/'. $news->image) : asset('images/khabarmukam/khabarmukam_fb_image.jpg') }}" />

<meta name="keywords" content="{{ $news->meta_keyword }}" />
<meta name="title" content="{{ $news->meta_title }}" />
<meta name="description" content="{{ $news->meta_description }}" />

@endsection

@section('content')
<section class="inner-breadcrumb">
    <div class="container-fluid">

        <!-- BIGRYAPAN -->
        @foreach ($ads as $ad)

        @if ($ad->slug == 'below-navbar-news-detail')
        @if (($ad->status == 1) && ($ad->status_2 == 1))
        @if (validateDate($today, $ad->publish_date, $ad->end_date, $ad->publish_date_2, $ad->end_date_2))

        <div class="inner-bigyapan" style="margin-bottom: 40px;">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ $ad->link }}" target="_blank"><img
                            src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                </div>

                <div class="col-md-6">
                    <a href="{{ $ad->link_2 }}" target="_blank"><img
                            src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
                </div>
            </div>
        </div>

        @else
        @if (validateSingleDate($today, $ad->publish_date, $ad->end_date))

        <div class="inner-bigyapan" style="margin-bottom: 40px;">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ $ad->link }}" target="_blank"><img
                            src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                </div>
            </div>
        </div>

        @elseif (validateSingleDate($today, $ad->publish_date_2, $ad->end_date_2))

        <div class="inner-bigyapan" style="margin-bottom: 40px;">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ $ad->link_2 }}" target="_blank"><img
                            src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
                </div>
            </div>
        </div>

        @endif
        @endif
        @elseif (($ad->status == 1) && ($ad->status_2 == 0))
        @if (validateSingleDate($today, $ad->publish_date, $ad->end_date))

        <div class="inner-bigyapan" style="margin-bottom: 40px;">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ $ad->link }}" target="_blank"><img
                            src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                </div>
            </div>
        </div>

        @endif
        @elseif (($ad->status == 0) && ($ad->status_2 == 1))
        @if (validateSingleDate($today, $ad->publish_date_2, $ad->end_date_2))

        <div class="inner-bigyapan" style="margin-bottom: 40px;">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ $ad->link_2 }}" target="_blank"><img
                            src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
                </div>
            </div>
        </div>

        @endif
        @endif

        <?php break; ?>
        @endif
        @endforeach
        {{-- END OF BIGYAPAN --}}

        <div class="inner-breacrumb-text">
            <ul>
                <li class="bread-link"><a href="{{ route('frontend.home') }}">गृहपृष्ठ </a></li>

                <li class="bread-link">
                    <?php
                  $countCategories = $news->categories->count();
                  for ($i = 0; $i < $countCategories; $i++){
                    if ($i != ($countCategories-1)){
                      echo '<a href="'. route('frontend.category', $news->categories[$i]->slug) .'">'. $news->categories[$i]->title_np.'</a> / ';
                    }
                    else{
                      echo '<a href="'. route('frontend.category', $news->categories[$i]->slug) .'">'. $news->categories[$i]->title_np .'</a>';
                    }
                  } 
                ?>
                </li>

                <li>समाचार</li>
            </ul>
        </div>
    </div>
</section>

<section class="inner-news-single sec-padding">
    <div class="container-fluid">
        <div class="ins-title">
            <h2>{{ $news->title }}</h2>
        </div>

        <!-- BIGRYAPAN -->
        @foreach ($ads as $ad)

        @if ($ad->slug == 'below-news-title')
        @if (($ad->status == 1) && ($ad->status_2 == 1))
        @if (validateDate($today, $ad->publish_date, $ad->end_date, $ad->publish_date_2, $ad->end_date_2))

        <div class="inner-bigyapan" style="margin-bottom: 40px;">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ $ad->link }}" target="_blank"><img
                            src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                </div>

                <div class="col-md-6">
                    <a href="{{ $ad->link_2 }}" target="_blank"><img
                            src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
                </div>
            </div>
        </div>

        @else
        @if (validateSingleDate($today, $ad->publish_date, $ad->end_date))

        <div class="inner-bigyapan" style="margin-bottom: 40px;">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ $ad->link }}" target="_blank"><img
                            src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                </div>
            </div>
        </div>

        @elseif (validateSingleDate($today, $ad->publish_date_2, $ad->end_date_2))

        <div class="inner-bigyapan" style="margin-bottom: 40px;">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ $ad->link_2 }}" target="_blank"><img
                            src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
                </div>
            </div>
        </div>

        @endif
        @endif
        @elseif (($ad->status == 1) && ($ad->status_2 == 0))
        @if (validateSingleDate($today, $ad->publish_date, $ad->end_date))

        <div class="inner-bigyapan" style="margin-bottom: 40px;">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ $ad->link }}" target="_blank"><img
                            src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                </div>
            </div>
        </div>

        @endif
        @elseif (($ad->status == 0) && ($ad->status_2 == 1))
        @if (validateSingleDate($today, $ad->publish_date_2, $ad->end_date_2))

        <div class="inner-bigyapan" style="margin-bottom: 40px;">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ $ad->link_2 }}" target="_blank"><img
                            src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
                </div>
            </div>
        </div>

        @endif
        @endif

        <?php break; ?>
        @endif
        @endforeach
        {{-- END OF BIGYAPAN --}}

        <div class="ins-meta">
            <div class="ins-meta-left">
                <ul>
                    {{-- <li><i class="far fa-clock"></i>३७ मिनेट अगाडि</li> --}}
                    <li><a href="{{ route('frontend.author', $news->author->id) }}"><img
                                src="{{ !empty($news->author->image)? asset('images/author/'. $news->author->image) : asset('images/khabarmukam/favicon.png') }}"
                                alt="">{{ $news->author->name }}</a></li>
                    <li><i class="far fa-calendar-alt"></i>{{ getNpDate($news->published_date) }}</li>
                </ul>
            </div>
            <div class="ins-meta-right">
                <div class="insm-share">
                    <div class="sharethis-inline-share-buttons"></div>
                </div>
            </div>
        </div>
        <div class="inner-news-single-content">
            <div class="row">
                <div class="col-lg-9">
                    <div class="inner-news-single-desc">

                        @foreach ($ads as $ad)
                        @if ($ad->slug == 'above-news-image-(1st)')
                        @if (($ad->status == 1) && validateSingleDate($today, $ad->publish_date, $ad->end_date))

                        <div class="main-long-advert">
                            <a href="{{ $ad->link }}" target="_blank"><img
                                    src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                        </div>

                        @endif

                        <?php break; ?>

                        @endif
                        @endforeach

                        @foreach ($ads as $ad)
                        @if ($ad->slug == 'above-news-image-(2nd)')
                        @if (($ad->status == 1) && validateSingleDate($today, $ad->publish_date, $ad->end_date))

                        <div class="main-long-advert" style="margin-top: 30px;">
                            <a href="{{ $ad->link }}" target="_blank"><img
                                    src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                        </div>

                        @endif

                        <?php break; ?>

                        @endif
                        @endforeach

                        <div class="insd-img">

                            @if (empty($news->video_link))
                            <img src="{{ !empty($news->image)? asset('images/news/'. $news->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}"
                                alt="">
                            @else
                            <iframe width="100%" height="460"
                                src="https://www.youtube.com/embed/{{ $news->video_link }}" frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            @endif

                        </div>

                        @foreach ($ads as $ad)
                        @if ($ad->slug == 'below-news-image')
                        @if (($ad->status == 1) && validateSingleDate($today, $ad->publish_date, $ad->end_date))

                        <div class="main-long-advert">
                            <a href="{{ $ad->link }}" target="_blank"><img
                                    src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                        </div>

                        @endif

                        <?php break; ?>

                        @endif
                        @endforeach

                        <div class="insd-text">

                            {!! $news->caption !!}

                        </div>
                        <div class="insd-advert">
                            <div class="row">

                                @foreach ($ads as $ad)
                                @if ($ad->slug == 'between-description-1st')
                                @if (($ad->status == 1) && validateSingleDate($today, $ad->publish_date, $ad->end_date))

                                <div class="col-lg-4">
                                    <div class="main-right-advert-single">
                                        <a href="{{ $ad->link }}" target="_blank"><img
                                                src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                                    </div>
                                </div>

                                @endif

                                <?php break; ?>

                                @endif
                                @endforeach

                                @foreach ($ads as $ad)
                                @if ($ad->slug == 'between-description-2nd')
                                @if (($ad->status == 1) && validateSingleDate($today, $ad->publish_date, $ad->end_date))

                                <div class="col-lg-4">
                                    <div class="main-right-advert-single">
                                        <a href="{{ $ad->link }}" target="_blank"><img
                                                src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                                    </div>
                                </div>

                                @endif

                                <?php break; ?>

                                @endif
                                @endforeach

                                @foreach ($ads as $ad)
                                @if ($ad->slug == 'between-description-3rd')
                                @if (($ad->status == 1) && validateSingleDate($today, $ad->publish_date, $ad->end_date))

                                <div class="col-lg-4">
                                    <div class="main-right-advert-single">
                                        <a href="{{ $ad->link }}" target="_blank"><img
                                                src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                                    </div>
                                </div>

                                @endif

                                <?php break; ?>

                                @endif
                                @endforeach

                            </div>
                        </div>
                        <div class="insd-text">

                            {!! $news->description !!}

                        </div>

                        @if ($news->trends)
                        <div class="ins-tags">
                            <ul>
                                @foreach ($news->trends as $item)
                                <li><a href="{{ route('frontend.trend', $item->slug) }}">{{ $item->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @foreach ($ads as $ad)
                        @if ($ad->slug == 'below-description')
                        @if (($ad->status == 1) && validateSingleDate($today, $ad->publish_date, $ad->end_date))

                        <div class="main-long-advert mt-30">
                            <a href="{{ $ad->link }}" target="_blank"><img
                                    src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                        </div>

                        @endif

                        <?php break; ?>

                        @endif
                        @endforeach

                        <div class="news-reaction">
                            <h4>यो खबर पढेर तपाईलाई कस्तो महसुस भयो ?</h4>
                            <div class="da-reactions-data da-reactions-container-async center in-viewport spotted">
                                <div class="da-reactions-container center ">
                                    <div class="reactions-toggle"><svg xmlns="http://www.w3.org/2000/svg" x="0px"
                                            y="0px" viewBox="0 0 100 100" width="64" height="64" xml:space="preserve">
                                            <path class="bar1" d="M100,10.716c0,4.261-3.455,7.716-7.716,7.716H7.717c-4.261,0-7.716-3.455-7.716-7.716l0,0C0.001,6.455,3.455,3,7.717,3
                                            h84.567C96.545,3,100,6.455,100,10.716L100,10.716z"></path>
                                            <path class="bar2" d="M100,49.732c0,4.262-3.455,7.716-7.716,7.716H7.717c-4.261,0-7.716-3.454-7.716-7.716l0,0c0-4.261,3.455-7.716,7.716-7.716
                                                h84.567C96.545,42.016,100,45.471,100,49.732L100,49.732z"></path>
                                            <path class="bar3" d="M100,88.749c0,4.261-3.455,7.716-7.716,7.716H7.717c-4.261,0-7.716-3.455-7.716-7.716l0,0c0-4.261,3.455-7.716,7.716-7.716
                                                h84.567C96.545,81.033,100,84.487,100,88.749L100,88.749z"></path>
                                        </svg>
                                    </div>

                                    <div class="reactions">
                                        <div class="da-reactions-data reaction reaction_11 inactive"
                                            onclick="newsReact('love')" data-id="118584" data-nonce="52ee943e1a"
                                            data-reaction="11" data-title="Love" data-type="post">
                                            <img src="{{ asset('frontend/images/rec2.svg') }}" alt="Love" width="64"
                                                height="64" style="width:64px; height:64px">
                                            <div class="count" id="love">
                                                {{ !empty($newsReact)? $newsReact['lovePercent'] : '' }}</div>
                                        </div>
                                        <div class="da-reactions-data reaction reaction_12 inactive"
                                            onclick="newsReact('wow')" data-id="118584" data-nonce="52ee943e1a"
                                            data-reaction="12" data-title="Wow" data-type="post">
                                            <img src="{{ asset('frontend/images/rec3.svg') }}" alt="WOW" width="64"
                                                height="64" style="width:64px; height:64px">
                                            <div class="count" id="wow">
                                                {{ !empty($newsReact)? $newsReact['wowPercent'] : '' }}</div>
                                        </div>
                                        <div class="da-reactions-data reaction reaction_9 inactive"
                                            onclick="newsReact('liked')" data-id="118584" data-nonce="52ee943e1a"
                                            data-reaction="9" data-title="Like" data-type="post">
                                            <img src="{{ asset('frontend/images/rec1.svg') }}" alt=" Like" width="64"
                                                height="64" style="width:64px; height:64px">
                                            <div class="count" id="liked">
                                                {{ !empty($newsReact)? $newsReact['likedPercent'] : '' }}</div>
                                        </div>
                                        <div class="da-reactions-data reaction reaction_14 inactive"
                                            onclick="newsReact('laugh')" data-id="118584" data-nonce="52ee943e1a"
                                            data-reaction="14" data-title="Laugh" data-type="post">
                                            <img src="{{ asset('frontend/images/rec5.svg') }}" alt="Laugh" width="64"
                                                height="64" style="width:64px; height:64px">
                                            <div class="count" id="laugh">
                                                {{ !empty($newsReact)? $newsReact['laughPercent'] : '' }}</div>
                                        </div>
                                        <div class="da-reactions-data reaction reaction_13 inactive"
                                            onclick="newsReact('sad')" data-id="118584" data-nonce="52ee943e1a"
                                            data-reaction="13" data-title="Sad" data-type="post">
                                            <img src="{{ asset('frontend/images/rec4.svg') }}" alt="Sad" width="64"
                                                height="64" style="width:64px; height:64px">
                                            <div class="count" id="sad">
                                                {{ !empty($newsReact)? $newsReact['sadPercent'] : '' }}</div>
                                        </div>
                                        <div class="da-reactions-data reaction reaction_10 inactive"
                                            onclick="newsReact('angry')" data-id="118584" data-nonce="52ee943e1a"
                                            data-reaction="10" data-title="Angry" data-type="post">
                                            <img src="{{ asset('frontend/images/rec6.svg') }}" alt="Angry" width="64"
                                                height="64" style="width:64px; height:64px">
                                            <div class="count" id="angry">
                                                {{ !empty($newsReact)? $newsReact['angryPercent'] : '' }}</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="ins-comments">
                            <div class="fb-comments" data-href="{{ Request::url() }}" data-width="100%"
                                data-numposts="10"></div>
                        </div>

                        @foreach ($ads as $ad)
                        @if ($ad->slug == 'below-facebook-comment')
                        @if (($ad->status == 1) && validateSingleDate($today, $ad->publish_date, $ad->end_date))

                        <div class="main-long-advert mt-30">
                            <a href="{{ $ad->link }}" target="_blank"><img
                                    src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                        </div>

                        @endif

                        <?php break; ?>

                        @endif
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="main-right-advert">

                        @foreach ($ads as $ad)
                        @if ($ad->slug == 'above-latest-update-(1st)')
                        @if (($ad->status == 1) && validateSingleDate($today, $ad->publish_date, $ad->end_date))

                        <div class="main-right-advert-single">
                            <a href="{{ $ad->link }}" target="_blank"><img
                                    src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                        </div>

                        @endif

                        <?php break; ?>

                        @endif
                        @endforeach

                        @foreach ($ads as $ad)
                        @if ($ad->slug == 'above-latest-update-(2nd)')
                        @if (($ad->status == 1) && validateSingleDate($today, $ad->publish_date, $ad->end_date))

                        <div class="main-right-advert-single">
                            <a href="{{ $ad->link }}" target="_blank"><img
                                    src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                        </div>

                        @endif

                        <?php break; ?>

                        @endif
                        @endforeach

                        @foreach ($ads as $ad)
                        @if ($ad->slug == 'above-latest-update-(3rd)')
                        @if (($ad->status == 1) && validateSingleDate($today, $ad->publish_date, $ad->end_date))

                        <div class="main-right-advert-single">
                            <a href="{{ $ad->link }}" target="_blank"><img
                                    src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                        </div>

                        @endif

                        <?php break; ?>

                        @endif
                        @endforeach

                    </div>
                    <div class="main-latest-right">
                        <div class="sec-title">
                            <h4>ताजा उपडेट </h4>
                        </div>
                        <div class="main-news-list">
                            <ul>

                                <!-- These must be 8, MUST BE -->
                                @foreach ($latestNews as $n)
                                <li><a href="{{ route('frontend.news', [date('Y', strtotime($n->published_date)),
                                        date('m', strtotime($n->published_date)), date('d', strtotime($n->published_date)),
                                        $n->id]) }}">{{ $n->title }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                    <div class="main-right-advert">

                        @foreach ($ads as $ad)
                        @if ($ad->slug == 'below-latest-update')
                        @if (($ad->status == 1) && validateSingleDate($today, $ad->publish_date, $ad->end_date))

                        <div class="main-right-advert-single">
                            <a href="{{ $ad->link }}" target="_blank"><img
                                    src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
                        </div>

                        @endif

                        <?php break; ?>

                        @endif
                        @endforeach
                    </div>
                    <div class="main-related-right">
                        <div class="sec-title">
                            <h4>सम्बन्धित खवर </h4>
                        </div>
                        <ul>

                            @foreach ($relatedNews as $n)
                            <li><a href="{{ route('frontend.news', [date('Y', strtotime($n->published_date)),
                                    date('m', strtotime($n->published_date)), date('d', strtotime($n->published_date)),
                                    $n->id]) }}">{{ $n->title }}</a></li>
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

@if ($ad->slug == 'above-missing-news')
@if (($ad->status == 1) && ($ad->status_2 == 1))
@if (validateDate($today, $ad->publish_date, $ad->end_date, $ad->publish_date_2, $ad->end_date_2))

<div class="main-bigyapan">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}"
                        alt=""></a>
            </div>

            <div class="col-md-6">
                <a href="{{ $ad->link_2 }}" target="_blank"><img
                        src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
            </div>
        </div>
    </div>
</div>

@else
@if (validateSingleDate($today, $ad->publish_date, $ad->end_date))

<div class="main-bigyapan">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}"
                        alt=""></a>
            </div>
        </div>
    </div>
</div>

@elseif (validateSingleDate($today, $ad->publish_date_2, $ad->end_date_2))

<div class="main-bigyapan">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ $ad->link_2 }}" target="_blank"><img
                        src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
            </div>
        </div>
    </div>
</div>

@endif
@endif
@elseif (($ad->status == 1) && ($ad->status_2 == 0))
@if (validateSingleDate($today, $ad->publish_date, $ad->end_date))

<div class="main-bigyapan">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}"
                        alt=""></a>
            </div>
        </div>
    </div>
</div>

@endif
@elseif (($ad->status == 0) && ($ad->status_2 == 1))
@if (validateSingleDate($today, $ad->publish_date_2, $ad->end_date_2))

<div class="main-bigyapan">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ $ad->link_2 }}" target="_blank"><img
                        src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
            </div>
        </div>
    </div>
</div>

@endif
@endif

<?php break; ?>
@endif
@endforeach
{{-- END OF BIGYAPAN --}}

<section class="main-missed inner-missed sec-padding">
    <div class="container-fluid">
        <div class="sec-title">
            <h4>छुटाउनुभयो कि?</h4>
            <span><a href="{{ route('frontend.content', 'left-out-news') }}">सबै </a></span>
        </div>
        <div class="main-missed-inner">
            <div class="row">

                @foreach ($lowViewedNews as $n)
                <div class="col-lg-4">
                    <div class="mnl-single">
                        <div class="mnls-img">
                            <a href="{{ route('frontend.news', [date('Y', strtotime($n->published_date)),
                                    date('m', strtotime($n->published_date)), date('d', strtotime($n->published_date)),
                                    $n->id]) }}"><img
                                    src="{{ !empty($n->image)? asset('images/news/low-quality/'. $n->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}"
                                    alt=""></a>
                        </div>
                        <div class="mnls-text">
                            <h4><a href="{{ route('frontend.news', [date('Y', strtotime($n->published_date)),
                                    date('m', strtotime($n->published_date)), date('d', strtotime($n->published_date)),
                                    $n->id]) }}">{{ $n->title }}</a></h4>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
@endsection

@section('after-script')

<script>
    var count = 0;
		function newsReact(react){
			
			if (count < 1){
				var _token = '{{ csrf_token() }}';
				var newsId = '{{ $news->id }}';
				
				$.ajax({
					type:'POST',
					url: '{{ route('news.react') }}', 
					data: {
						_token: _token,
						newsId: newsId,
						react: react,
					},
					success: function(data){
						var love = parseInt((data.love != null)? data.love : 0);
						var wow = parseInt((data.wow != null)? data.wow : 0);
						var liked = parseInt((data.liked != null)? data.liked : 0); 
						var laugh = parseInt((data.laugh != null)? data.laugh : 0);
						var sad = parseInt((data.sad != null)? data.sad : 0);
						var angry = parseInt((data.angry != null)? data.angry : 0);
						
						var total = love + wow + liked + laugh + sad + angry;

						if (total != 0){
						var lovePercent = Math.round((love/total)*100);
						var wowPercent = Math.round((wow/total)*100);
						var likedPercent = Math.round((liked/total)*100);
						var laughPercent = Math.round((laugh/total)*100);
						var sadPercent = Math.round((sad/total)*100);
						var angryPercent = Math.round((angry/total)*100);
						}
						else{
							var lovePercent = 0;
							var wowPercent = 0;
							var likedPercent = 0;
							var laughPercent = 0;
							var sadPercent = 0;
							var angryPercent = 0;
						}

						$('#love').html(lovePercent +' %');
						$('#wow').html(wowPercent +' %');
						$('#liked').html(likedPercent +' %');
						$('#laugh').html(laughPercent +' %');
						$('#sad').html(sadPercent +' %');
						$('#angry').html(angryPercent +' %');
					}
				});

			}
			count = 1;

		}
</script>
@endsection