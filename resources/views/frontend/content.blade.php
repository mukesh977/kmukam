@extends('frontend.layouts.master')

@section('title', $contentName. ' - Khabar Mukam')

@section('content')
    <section class="inner-breadcrumb">
        <div class="container-fluid">
            <!-- BIGRYAPAN -->
			@foreach ($ads as $ad)

				@if ($ad->slug == 'below-header')
					@if (($ad->status == 1) && ($ad->status_2 == 1))
						@if (validateDate($today, $ad->publish_date, $ad->end_date, $ad->publish_date_2, $ad->end_date_2))
							
							<div class="inner-bigyapan" style="margin-bottom: 40px;">
								<div class="row">	
									<div class="col-md-6">
										<a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
									</div>

									<div class="col-md-6">
										<a href="{{ $ad->link_2 }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
									</div>
								</div>
							</div>

						@else
							@if (validateSingleDate($today, $ad->publish_date, $ad->end_date))
								
								<div class="inner-bigyapan" style="margin-bottom: 40px;">
									<div class="row">
										<div class="col-md-12">
											<a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
										</div>
									</div>
								</div>

							@elseif (validateSingleDate($today, $ad->publish_date_2, $ad->end_date_2))
								
								<div class="inner-bigyapan" style="margin-bottom: 40px;">
									<div class="row">
										<div class="col-md-12">
											<a href="{{ $ad->link_2 }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
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
										<a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
									</div>
								</div>
							</div>

						@endif
					@elseif (($ad->status == 0) && ($ad->status_2 == 1))
						@if (validateSingleDate($today, $ad->publish_date_2, $ad->end_date_2))
							
							<div class="inner-bigyapan" style="margin-bottom: 40px;">
								<div class="row">
									<div class="col-md-12">
										<a href="{{ $ad->link_2 }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
									</div>
								</div>
							</div>

						@endif
					@endif
								
					<?php break; ?>
				@endif
			@endforeach
			{{-- END OF BIGYAPAN --}}
        </div>
    </section>

    <section class="inner-category sec-padding">
        <div class="container-fluid">
            <div class="inner-category-upper">

				<?php 
					$countContentNews = $contentNews->count(); 
					$countFirst = ($countContentNews >= 1)? 1 : $countContentNews; 
					$countSecond = (($countContentNews > $countFirst) && ($countContentNews >= 3))? 3 : $countContentNews; 
				?>

				@if ($countFirst > 0)
					<div class="row">
						
						@for ($i = 0; $i < $countFirst; $i++)
							<div class="col-lg-8">
								<div class="main-news-big" style="background-image: url('{{ !empty($contentNews[$i]->image)? '/images/news/'. $contentNews[$i]->image : '/images/khabarmukam/khabarmukam_not_found_image.jpg' }}');">
									<div class="msb-text">
										<h4><a href="{{ route('frontend.news', [date('Y', strtotime($contentNews[$i]->published_date)),
											date('m', strtotime($contentNews[$i]->published_date)), date('d', strtotime($contentNews[$i]->published_date)),
											$contentNews[$i]->id]) }}">
											{{ $contentNews[$i]->title }}</a></h4>
										<ul class="news-meta">
											<li><a href="#"><i class="far fa-user-circle"></i>{{ $contentNews[$i]->author_name }}</a></li>
											<li><i class="far fa-clock"></i>{{ getNpDateMonthYear($contentNews[$i]->published_date) }}</li>
										</ul>
									</div>
								</div>
							</div>
						@endfor
						
						@if ($countSecond > 1)
							<div class="col-lg-4">

								@for ($i = 1; $i < $countSecond; $i++)
									<div class="main-news-small">
										<div class="mns-img">
											<a href="{{ route('frontend.news', [date('Y', strtotime($contentNews[$i]->published_date)),
												date('m', strtotime($contentNews[$i]->published_date)), date('d', strtotime($contentNews[$i]->published_date)),
												$contentNews[$i]->id]) }}"><img src="{{ !empty($contentNews[$i]->image)? asset('images/news/high-quality/'. $contentNews[$i]->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}" alt=""></a>
										</div>
										<div class="mns-text">
											<h4><a href="{{ route('frontend.news', [date('Y', strtotime($contentNews[$i]->published_date)),
												date('m', strtotime($contentNews[$i]->published_date)), date('d', strtotime($contentNews[$i]->published_date)),
												$contentNews[$i]->id]) }}">
												{{ $contentNews[$i]->title }}</a></h4>

										</div>
									</div>
								@endfor

							</div>
						@endif

					</div>
				@endif

            </div>
            <div class="main-bigyapan main-bigyapan-three">
                <div class="row">
                    
					@foreach ($ads as $ad)
						@if ($ad->slug == 'in-between-category-news-(1st)')
							@if (($ad->status == 1) && validateSingleDate($today, $ad->publish_date, $ad->end_date))
									
								<div class="col-lg-4">
									<div class="main-bigyapan-row">
										<a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
									</div>
								</div>

							@endif
							
							<?php break; ?>

						@endif
					@endforeach

					@foreach ($ads as $ad)
						@if ($ad->slug == 'in-between-category-news-(2nd)')
							@if (($ad->status == 1) && validateSingleDate($today, $ad->publish_date, $ad->end_date))
									
								<div class="col-lg-4">
									<div class="main-bigyapan-row">
										<a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
									</div>
								</div>

							@endif
							
							<?php break; ?>

						@endif
					@endforeach

					@foreach ($ads as $ad)
						@if ($ad->slug == 'in-between-category-news-(3rd)')
							@if (($ad->status == 1) && validateSingleDate($today, $ad->publish_date, $ad->end_date))
									
								<div class="col-lg-4">
									<div class="main-bigyapan-row">
										<a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
									</div>
								</div>

							@endif
							
							<?php break; ?>

						@endif
					@endforeach

                </div>
            </div>
            <div class="inner-category-lower">

				@if ($countContentNews > 3)
					<div class="row">
						
						@for ($i = 3; $i < $countContentNews; $i++)
							<div class="col-lg-4">
								<div class="main-news-small">
									<div class="mns-img">
										<a href="{{ route('frontend.news', [date('Y', strtotime($contentNews[$i]->published_date)),
											date('m', strtotime($contentNews[$i]->published_date)), date('d', strtotime($contentNews[$i]->published_date)),
											$contentNews[$i]->id]) }}"><img src="{{ !empty($contentNews[$i]->image)? asset('images/news/high-quality/'. $contentNews[$i]->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}" alt=""></a>
									</div>
									<div class="mns-text">
										<h4><a href="{{ route('frontend.news', [date('Y', strtotime($contentNews[$i]->published_date)),
											date('m', strtotime($contentNews[$i]->published_date)), date('d', strtotime($contentNews[$i]->published_date)),
											$contentNews[$i]->id]) }}">{{ $contentNews[$i]->title }}</a></h4>
									</div>
								</div>
							</div>
						@endfor
						
					</div>
				@endif
				
				@if ($contentNews->total() > $contentNews->perPage())
					{!! $contentNews->links('frontend.partials.paginator') !!}
				@else
					<div class="inner-pagination">
						<div class="pagination">
							<a>&lsaquo;&lsaquo;</a>
							<a class="active">1</a>
							<a>&rsaquo;&rsaquo;</a>
						</div>
					</div>
				@endif

            </div>
        </div>
    </section>

    <!-- BIGRYAPAN -->
	@foreach ($ads as $ad)

		@if ($ad->slug == 'above-footer')
			@if (($ad->status == 1) && ($ad->status_2 == 1))
				@if (validateDate($today, $ad->publish_date, $ad->end_date, $ad->publish_date_2, $ad->end_date_2))
					
					<div class="main-bigyapan" style="margin-bottom: 40px;">
						<div class="container-fluid">
							<div class="row">	
								<div class="col-md-6">
									<a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
								</div>

								<div class="col-md-6">
									<a href="{{ $ad->link_2 }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
								</div>
							</div>
						</div>
					</div>

				@else
					@if (validateSingleDate($today, $ad->publish_date, $ad->end_date))
						
						<div class="main-bigyapan" style="margin-bottom: 40px;">
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-12">
										<a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
									</div>
								</div>
							</div>
						</div>

					@elseif (validateSingleDate($today, $ad->publish_date_2, $ad->end_date_2))
						
						<div class="main-bigyapan" style="margin-bottom: 40px;">
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-12">
										<a href="{{ $ad->link_2 }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
									</div>
								</div>
							</div>
						</div>

					@endif
				@endif
			@elseif (($ad->status == 1) && ($ad->status_2 == 0))
				@if (validateSingleDate($today, $ad->publish_date, $ad->end_date))
					
					<div class="main-bigyapan" style="margin-bottom: 40px;">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}" alt=""></a>
								</div>
							</div>
						</div>
					</div>

				@endif
			@elseif (($ad->status == 0) && ($ad->status_2 == 1))
				@if (validateSingleDate($today, $ad->publish_date_2, $ad->end_date_2))
					
					<div class="main-bigyapan" style="margin-bottom: 40px;">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<a href="{{ $ad->link_2 }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image_2) }}" alt=""></a>
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
@endsection
