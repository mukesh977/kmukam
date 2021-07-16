<!-- BIGRYAPAN -->
@foreach ($ads as $ad)

    @if ($ad->slug == 'below-navbar-home')

		@if ($ad->status == 1 && $ad->status_2 == 1)
			@if (validateDate($today, $ad->publish_date, $ad->end_date, $ad->publish_date_2, $ad->end_date_2))
				
			<div class="main-bigyapan" style="margin-top: 50px">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6">
								<a href="{{ $ad->link }}" target="_blank"><img
										src="{{ asset('images/advertisement/' . $ad->image) }}" alt=""></a>
							</div>

							<div class="col-md-6">
								<a href="{{ $ad->link_2 }}" target="_blank"><img
										src="{{ asset('images/advertisement/' . $ad->image_2) }}" alt=""></a>
							</div>
						</div>
					</div>
				</div>

			@else
				@if (validateSingleDate($today, $ad->publish_date, $ad->end_date))
					
					<div class="main-bigyapan" style="margin-top: 50px">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<a href="{{ $ad->link }}" target="_blank"><img
											src="{{ asset('images/advertisement/' . $ad->image) }}" alt=""></a>
								</div>
							</div>
						</div>
					</div>

				@elseif (validateSingleDate($today, $ad->publish_date_2, $ad->end_date_2))
					<div class="main-bigyapan" style="margin-top: 50px">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<a href="{{ $ad->link_2 }}" target="_blank"><img
											src="{{ asset('images/advertisement/' . $ad->image_2) }}" alt=""></a>
								</div>
							</div>
						</div>
					</div>

				@endif
			@endif
		@elseif (($ad->status == 1) && ($ad->status_2 == 0))
			@if (validateSingleDate($today, $ad->publish_date, $ad->end_date))
				
				<div class="main-bigyapan" style="margin-top: 50px">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<a href="{{ $ad->link }}" target="_blank"><img
										src="{{ asset('images/advertisement/' . $ad->image) }}" alt=""></a>
							</div>
						</div>
					</div>
				</div>

			@endif
		@elseif (($ad->status == 0) && ($ad->status_2 == 1))
			@if (validateSingleDate($today, $ad->publish_date_2, $ad->end_date_2))
				
				<div class="main-bigyapan" style="margin-top: 50px">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<a href="{{ $ad->link_2 }}" target="_blank"><img
										src="{{ asset('images/advertisement/' . $ad->image_2) }}" alt=""></a>
							</div>
						</div>
					</div>
				</div>

			@endif
		@endif

        <?php break; ?>
    @endif
@endforeach

<!-- BREAKING NEWS -->
<section class="main-breaking">
    <div class="container-fluid">
        <!-- These must be 4, MUST BE -->

        @foreach ($breakingNews as $news)
            <div class="main-breaking-single">
                <h2><a href="{{ route('frontend.news', [date('Y', strtotime($news->published_date)),
                    date('m', strtotime($news->published_date)), date('d', strtotime($news->published_date)),
                    $news->id]) }}">{{ $news->title }}</a></h2>
                
                <span><a href="{{ route('frontend.author', $news->author->id) }}">
                    <img src="{{ asset('images/author/'. $news->author->image) }}" alt="">{{ $news->author->name }}
                </a></span>
                
                @if ($news->show_image == 1)
                    <a href="{{ route('frontend.news', [date('Y', strtotime($news->published_date)),
                        date('m', strtotime($news->published_date)), date('d', strtotime($news->published_date)),
                        $news->id]) }}"><img src="{{ !empty($news->image)? asset('images/news/' . $news->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}" alt=""></a>
                @endif

            </div>
        @endforeach
        
    </div>
</section>

<!-- BIGRYAPAN -->
@foreach ($ads as $ad)

  @if ($ad->slug == 'below-breaking-news')
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
