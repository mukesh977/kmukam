<!-- PRADESH -->
<section class="main-pradesh sec-padding">
    <div class="container-fluid">
        <div class="sec-title">
            <h4>प्रदेश समाचार </h4>
            <span><a href="{{ route('frontend.category', 'province') }}">सबै </a></span>
        </div>
        <div class="main-pradesh-tab">
            <div class="row">
                <div class="col-lg-2">
                    <div class="mpt-left">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            
                            @foreach ($provinceCategory->subCategories as $index1 => $subCategory)
                                <li class="nav-item">
                                    <a class="nav-link {{ ($index1==0)? 'active' : '' }}" id="pills-{{ $index1 + 1 }}-tab" data-toggle="pill" href="#pills-{{ $index1 + 1 }}"
                                        role="tab" aria-controls="pills-{{ $index1 + 1 }}" aria-selected="{{ ($index1==0)? 'true' : 'false' }}">{{ $subCategory->title_np }} </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="mpt-right">
                        <div class="tab-content" id="pills-tabContent">

                            @foreach ($provinceCategory->subCategories as $index2 => $subCategory)
                                <div class="tab-pane fade {{ ($index2==0)? 'active show' : '' }}" id="pills-{{ $index2 + 1 }}" role="tabpanel"
                                    aria-labelledby="pills-{{ $index2 + 1 }}-tab">
                                    <div class="row">
                                        <div class="col-lg-8">

                                            @foreach ($subCategory->news as $index3 => $news)
                                                @if ($index3 == 0)
                                                    <div class="main-news-big"
                                                        style="background-image: url('{{ !empty($news->image)? 'images/news/'. $news->image : 'images/khabarmukam/khabarmukam_not_found_image.jpg' }}');">
                                                        <div class="msb-text">
                                                            <h4><a href="{{ route('frontend.news', [date('Y', strtotime($news->published_date)),
                                                                date('m', strtotime($news->published_date)), date('d', strtotime($news->published_date)),
                                                                $news->id]) }}">
                                                                {{ $news->title }}</a></h4>

                                                            <ul class="news-meta">
                                                                <li><a href="#"><i class="far fa-user-circle"></i>{{ $news->author->name }}</a>
                                                                </li>
                                                                <li><i class="far fa-clock"></i>{{ getNpDateMonthYear($news->published_date) }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @elseif ($index3 > 0)
                                                    <?php break; ?>
                                                @endif
                                            @endforeach

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mptr-right">

                                                @foreach ($subCategory->news as $index3 => $news)
                                                    @if ($index3 == 1)
                                                        <div class="main-news-small">
                                                            <div class="mns-img">
                                                                <a href="{{ route('frontend.news', [date('Y', strtotime($news->published_date)),
                                                                    date('m', strtotime($news->published_date)), date('d', strtotime($news->published_date)),
                                                                    $news->id]) }}"><img src="{{ !empty($news->image)? asset('images/news/medium-quality/'. $news->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}"
                                                                        alt=""></a>
                                                            </div>
                                                            <div class="mns-text">
                                                                <h4><a href="{{ route('frontend.news', [date('Y', strtotime($news->published_date)),
                                                                    date('m', strtotime($news->published_date)), date('d', strtotime($news->published_date)),
                                                                    $news->id]) }}">{{ $news->title }}</a></h4>
                                                            </div>
                                                        </div>

                                                    @elseif ($index3 > 1)
                                                        <?php break; ?>
                                                    @endif
                                                @endforeach

                                                <div class="main-news-list">

                                                    @foreach ($subCategory->news as $index3 => $news)
                                                        @if ($index3 >= 2 && $index3 <= 3)
                                                            <div class="mnl-single">
                                                                <div class="mnls-img">
                                                                    <a href="{{ route('frontend.news', [date('Y', strtotime($news->published_date)),
                                                                        date('m', strtotime($news->published_date)), date('d', strtotime($news->published_date)),
                                                                        $news->id]) }}"><img src="{{ !empty($news->image)? asset('images/news/low-quality/'. $news->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}"
                                                                            alt=""></a>
                                                                </div>
                                                                <div class="mnls-text">
                                                                    <h4><a href="{{ route('frontend.news', [date('Y', strtotime($news->published_date)),
                                                                        date('m', strtotime($news->published_date)), date('d', strtotime($news->published_date)),
                                                                        $news->id]) }}">{{ $news->title }}</a></h4>
                                                                </div>
                                                            </div>
                                                        
                                                        @elseif ($index3 > 3)
                                                            <?php break; ?>
                                                        @endif
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</section>

<!-- BIGRYAPAN -->
@foreach ($ads as $ad)

    @if ($ad->slug == 'below-province-news')
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
