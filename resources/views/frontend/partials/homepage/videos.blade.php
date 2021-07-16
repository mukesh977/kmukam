<!-- VIDEOS -->
<section class="main-videos sec-padding" style="margin: 50px 0;">
    <div class="container-fluid">
        <div class="sec-title">
            <h4>भिडियो</h4>
            <span><a href="{{ route('frontend.category', 'video') }}">सबै </a></span>
        </div>
        <div class="main-video-slider">

            @foreach ($video as $news)
                <div class="main-video-single">
                    <iframe width="100%" height="215" src="https://www.youtube.com/embed/{{ $news->video_link }}" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            @endforeach

        </div>
    </div>
</section>


<!-- BIGRYAPAN -->
@foreach ($ads as $ad)

    @if ($ad->slug == 'below-video')
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
