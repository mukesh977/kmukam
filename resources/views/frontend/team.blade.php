@extends('frontend.layouts.master')

@section('title', 'हाम्रो टिम - Khabar Mukam')

@section('content')
  <section class="inner-breadcrumb">
    <div class="container-fluid">
        {{-- <div class="inner-bigyapan" style="margin-bottom: 40px;">
            <a href="#"><img src="images/ub-long-2.gif" alt=""></a>
        </div> --}}
        <div class="inner-breacrumb-text">
            <ul>
                <li class="bread-link"><a href="{{ route('frontend.home') }}">गृहपृष्ठ </a></li>
                <li>हाम्रो टिम</li>
            </ul>
        </div>
    </div>
  </section>

  <section class="inner-team sec-padding">
    <div class="container-fluid">
        
		@foreach ($teamCategories as $category)
			<div class="inner-team-category">
				<div class="sec-title">
					<h4>{{ $category->name }}</h4>
				</div>
				<div class="row">
					
					@foreach ($category->team as $team)
						<div class="col-lg-3">
							<div class="inner-team-single">
								<img src="{{ asset('images/team/'. $team->featured_image) }}" alt="">
								<div class="inner-team-caption">
									<h4>{{ $team->name }}</h4>
									<p>{{ $team->designation }}</p>
								</div>
							</div>
						</div>
					@endforeach
					
				</div>
			</div>
		@endforeach

    </div>
  </section>
@endsection