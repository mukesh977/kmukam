@extends('frontend.layouts.master')

@section('title', $trend->title.' - Khabar Mukam')

@section('after-head')
<meta name="title" content="{{ $trend->title }}" />
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
					<a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}"
							alt=""></a>
				</div>

				<div class="col-md-6">
					<a href="{{ $ad->link_2 }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image_2) }}"
							alt=""></a>
				</div>
			</div>
		</div>

		@else
		@if (validateSingleDate($today, $ad->publish_date, $ad->end_date))

		<div class="inner-bigyapan" style="margin-bottom: 40px;">
			<div class="row">
				<div class="col-md-12">
					<a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}"
							alt=""></a>
				</div>
			</div>
		</div>

		@elseif (validateSingleDate($today, $ad->publish_date_2, $ad->end_date_2))

		<div class="inner-bigyapan" style="margin-bottom: 40px;">
			<div class="row">
				<div class="col-md-12">
					<a href="{{ $ad->link_2 }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image_2) }}"
							alt=""></a>
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
					<a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}"
							alt=""></a>
				</div>
			</div>
		</div>

		@endif
		@elseif (($ad->status == 0) && ($ad->status_2 == 1))
		@if (validateSingleDate($today, $ad->publish_date_2, $ad->end_date_2))

		<div class="inner-bigyapan" style="margin-bottom: 40px;">
			<div class="row">
				<div class="col-md-12">
					<a href="{{ $ad->link_2 }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image_2) }}"
							alt=""></a>
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
				<li>{{ $trend->title }}</li>
			</ul>
		</div>
	</div>
</section>

<section class="inner-category sec-padding">
	<div class="container-fluid">
		<div class="inner-category-upper">
		</div>
		<div class="inner-category-lower">

			<div class="row">
				@foreach ($trendNews as $news)
				<div class="main-news-small">
					<div class="mns-img">
						<a href="{{ route('frontend.news', [date('Y', strtotime($news->published_date)),
											date('m', strtotime($news->published_date)), date('d', strtotime($news->published_date)),
											$news->id]) }}"><img
								src="{{ !empty($news->image)? asset('images/news/high-quality/'. $news->image) : asset('images/khabarmukam/khabarmukam_not_found_image.jpg') }}"
								alt=""></a>
					</div>
					<div class="mns-text">
						<h4><a href="{{ route('frontend.news', [date('Y', strtotime($news->published_date)),
											date('m', strtotime($news->published_date)), date('d', strtotime($news->published_date)),
											$news->id]) }}">{{ $news->title }}</a></h4>
					</div>
				</div>
				@endforeach
			</div>

		</div>

		{!! $trendNews->links('frontend.partials.paginator') !!}

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
				<a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}"
						alt=""></a>
			</div>

			<div class="col-md-6">
				<a href="{{ $ad->link_2 }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image_2) }}"
						alt=""></a>
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
				<a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}"
						alt=""></a>
			</div>
		</div>
	</div>
</div>

@elseif (validateSingleDate($today, $ad->publish_date_2, $ad->end_date_2))

<div class="main-bigyapan" style="margin-bottom: 40px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<a href="{{ $ad->link_2 }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image_2) }}"
						alt=""></a>
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
				<a href="{{ $ad->link }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image) }}"
						alt=""></a>
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
				<a href="{{ $ad->link_2 }}" target="_blank"><img src="{{ asset('images/advertisement/'. $ad->image_2) }}"
						alt=""></a>
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