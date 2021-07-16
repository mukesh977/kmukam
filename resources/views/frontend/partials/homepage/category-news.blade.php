<!-- CATEGORIES NEWS -->
<section class="main-category sec-padding">
    <div class="container-fluid">
        <div class="row">
            
            @foreach ($datas['data'] as $index1 => $data)
                @if (!$data->isEmpty())
                    <div class="col-lg-3">
                        <div class="main-category-single">
                            <div class="sec-title">
                                <h4>{{ $data[0]->category_name }}</h4>
                                <span><a href="{{ route('frontend.category', $data[0]->category_slug) }}">सबै </a></span>
                            </div>
                            <div class="mcns-news">

                                <?php 
                                    $countNews = $data->count(); 
                                    $countFirst = ($countNews >= 1)? 1 : $countNews; 
                                ?>

                                @for ($i = 0; $i < $countFirst; $i++)
                                    <div class="main-news-small">
                                        <div class="mns-img">
                                            <a href="{{ route('frontend.news', [date('Y', strtotime($data[$i]->published_date)),
                                                date('m', strtotime($data[$i]->published_date)), date('d', strtotime($data[$i]->published_date)),
                                                $data[$i]->id]) }}"><img src="{{ !empty($data[$i]->image)? asset('images/news/medium-quality/'. $data[$i]->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="mns-text">
                                            <h4><a href="{{ route('frontend.news', [date('Y', strtotime($data[$i]->published_date)),
                                                date('m', strtotime($data[$i]->published_date)), date('d', strtotime($data[$i]->published_date)),
                                                $data[$i]->id]) }}">{{ $data[$i]->title }}</a></h4>
                                        </div>
                                    </div>
                                @endfor

                                <!-- List news only 2 -->
                                <div class="main-news-list">
                                    <ul>

                                        @for ($i = 1; $i < $countNews; $i++)
                                            <li><a href="{{ route('frontend.news', [date('Y', strtotime($data[$i]->published_date)),
                                                date('m', strtotime($data[$i]->published_date)), date('d', strtotime($data[$i]->published_date)),
                                                $data[$i]->id]) }}">{{ Str::words($data[$i]->title, 7) }}</a></li>
                                        @endfor

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
</section>


<!-- BIGRYAPAN -->
@foreach ($ads as $ad)

    @if ($ad->slug == 'below-categories')
        <div class="main-bigyapan" style="margin-bottom: 50px;">
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