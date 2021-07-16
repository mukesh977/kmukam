<!-- SAMACHAR -->
@if (!$samachar->isEmpty())
	<section class="main-entertainment sec-padding">
		<div class="container-fluid">
			<div class="sec-title">
				<h4>समाचार</h4>
				<span><a href="{{ route('frontend.category', 'news') }}">सबै </a></span>
			</div>
			<div class="row">
				
				@foreach ($samachar as $news)
					<div class="col-lg-3">
						<div class="main-entertainment-single">
							<div class="mes-img">
								<img src="{{ !empty($news->image)? asset('images/news/'. $news->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}" alt="">
							</div>
							<div class="mes-text">
								<h4><a href="{{ route('frontend.news', [date('Y', strtotime($news->published_date)),
									date('m', strtotime($news->published_date)), date('d', strtotime($news->published_date)),
									$news->id]) }}">{{ $news->title }}
									</a></h4>

							</div>
						</div>
					</div>
				@endforeach
				
			</div>
		</div>
	</section>


    <!-- BIGRYAPAN -->
    @foreach ($ads as $ad)
    
      @if ($ad->slug == 'below-samachar')
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
    
@endif
