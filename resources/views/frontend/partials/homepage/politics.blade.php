<!-- POLITICS -->
<section class="main-politics sec-padding">
    <div class="container-fluid">
        <div class="sec-title">
            <h4>राजनीति</h4>
            <span><a href="{{ route('frontend.category', 'politics') }}">सबै </a></span>
        </div>
        <div class="row">
            <div class="col-lg-5">

                <?php 
                    $countPolitics = $politics->count(); 
                    $countFirst = ($countPolitics >= 1)? 1 : $countPolitics; 
                ?>

                @for ($i = 0; $i < $countFirst; $i++)
                    <div class="main-news-big" style="background-image: url('{{ !empty($politics[$i]->image)? 'images/news/'. $politics[$i]->image : 'images/khabarmukam/khabarmukam_not_found_image.jpg' }}');">
                        <div class="msb-text">
                            <h4><a href="{{ route('frontend.news', [date('Y', strtotime($politics[$i]->published_date)),
                                date('m', strtotime($politics[$i]->published_date)), date('d', strtotime($politics[$i]->published_date)),
                                $politics[$i]->id]) }}">
                                {{ $politics[$i]->title }}</a></h4>
                            <ul class="news-meta">
                                <li><a href="#"><i class="far fa-user-circle"></i>{{ $politics[$i]->author_name }}</a></li>
                                <li><i class="far fa-clock"></i>{{ getNpDateMonthYear($politics[$i]->published_date) }}</li>
                            </ul>
                        </div>
                    </div>
                @endfor

            </div>
            <div class="col-lg-7">
                <div class="main-politics-right">
                    <div class="row">

                        @for ($i = 1; $i < $countPolitics; $i++)
                            <div class="col-lg-4">
                                <div class="main-news-small">
                                    <div class="mns-img">
                                        <a href="{{ route('frontend.news', [date('Y', strtotime($politics[$i]->published_date)),
                                            date('m', strtotime($politics[$i]->published_date)), date('d', strtotime($politics[$i]->published_date)),
                                            $politics[$i]->id]) }}"><img src="{{ !empty($politics[$i]->image)? asset('images/news/medium-quality/'. $politics[$i]->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="mns-text">
                                        <h4><a href="{{ route('frontend.news', [date('Y', strtotime($politics[$i]->published_date)),
                                            date('m', strtotime($politics[$i]->published_date)), date('d', strtotime($politics[$i]->published_date)),
                                            $politics[$i]->id]) }}">{{ $politics[$i]->title }}</a></h4>
                                    </div>
                                </div>
                            </div>
                        @endfor

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BIGRYAPAN -->
@foreach ($ads as $ad)

    @if ($ad->slug == 'below-politics')
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
