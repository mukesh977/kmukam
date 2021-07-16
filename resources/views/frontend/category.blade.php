@extends('frontend.layouts.master')

@section('title', $category->title_np.' - Khabar Mukam')

@section('after-head')
  <meta name="keywords" content="{{ $category->meta_keyword }}"/>
  <meta name="title" content="{{ $category->meta_title }}"/>
  <meta name="description" content="{{ $category->meta_description }}"/>
@endsection

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
            
			<div class="inner-breacrumb-text">
                <ul>
                    <li class="bread-link"><a href="{{ route('frontend.home') }}">गृहपृष्ठ </a></li>
                    <li>{{ $category->title_np }}</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="inner-category sec-padding">
        <div class="container-fluid">
            <div class="inner-category-upper">

				<?php 
					$countCategoryNews = $categoryNews->count(); 
					$countFirst = ($countCategoryNews >= 1)? 1 : $countCategoryNews; 
					$countSecond = (($countCategoryNews > $countFirst) && ($countCategoryNews >= 3))? 3 : $countCategoryNews; 
				?>

				@if ($countFirst > 0)
					<div class="row">
						
						@for ($i = 0; $i < $countFirst; $i++)
							<div class="col-lg-8">
								<div class="main-news-big" style="background-image: url('{{ !empty($categoryNews[$i]->image)? '/images/news/'. $categoryNews[$i]->image : '/images/khabarmukam/khabarmukam_not_found_image.jpg' }}');">
									<div class="msb-text">
										<h4><a href="{{ route('frontend.news', [date('Y', strtotime($categoryNews[$i]->published_date)),
											date('m', strtotime($categoryNews[$i]->published_date)), date('d', strtotime($categoryNews[$i]->published_date)),
											$categoryNews[$i]->id]) }}">
											{{ $categoryNews[$i]->title }}</a></h4>
										<ul class="news-meta">
											<li><a href="{{ route('frontend.author', $categoryNews[$i]->author_id) }}"><i class="far fa-user-circle"></i>{{ $categoryNews[$i]->author_name }}</a></li>
											<li><i class="far fa-clock"></i>{{ getNpDateMonthYear($categoryNews[$i]->published_date) }}</li>
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
											<a href="{{ route('frontend.news', [date('Y', strtotime($categoryNews[$i]->published_date)),
												date('m', strtotime($categoryNews[$i]->published_date)), date('d', strtotime($categoryNews[$i]->published_date)),
												$categoryNews[$i]->id]) }}"><img src="{{ !empty($categoryNews[$i]->image)? asset('images/news/high-quality/'. $categoryNews[$i]->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}" alt=""></a>
										</div>
										<div class="mns-text">
											<h4><a href="{{ route('frontend.news', [date('Y', strtotime($categoryNews[$i]->published_date)),
												date('m', strtotime($categoryNews[$i]->published_date)), date('d', strtotime($categoryNews[$i]->published_date)),
												$categoryNews[$i]->id]) }}">
												{{ $categoryNews[$i]->title }}</a></h4>

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

				@if ($countCategoryNews > 3)
					<div class="row">
						
						@for ($i = 3; $i < $countCategoryNews; $i++)
							<div class="col-lg-4">
								<div class="main-news-small">
									<div class="mns-img">
										<a href="{{ route('frontend.news', [date('Y', strtotime($categoryNews[$i]->published_date)),
											date('m', strtotime($categoryNews[$i]->published_date)), date('d', strtotime($categoryNews[$i]->published_date)),
											$categoryNews[$i]->id]) }}"><img src="{{ !empty($categoryNews[$i]->image)? asset('images/news/high-quality/'. $categoryNews[$i]->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}" alt=""></a>
									</div>
									<div class="mns-text">
										<h4><a href="{{ route('frontend.news', [date('Y', strtotime($categoryNews[$i]->published_date)),
											date('m', strtotime($categoryNews[$i]->published_date)), date('d', strtotime($categoryNews[$i]->published_date)),
											$categoryNews[$i]->id]) }}">{{ $categoryNews[$i]->title }}</a></h4>
									</div>
								</div>
							</div>
						@endfor
						
					</div>
				@endif
				
				@if ($categoryNews->total() > $categoryNews->perPage())
					{!! $categoryNews->links('frontend.partials.paginator') !!}
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
