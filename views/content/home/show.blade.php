@extends('layout')

@section('head-after')
	{!! Theme::css('vendor/img-comparison-slider/img-comparison-slider.css') !!}
@endsection

@section('content')

	<!-- About -->
	@if(!empty($data->object))
		<section class="container my-48 py-lg-48 py-md-24 py-16">
			<div class="row gy-4 py-xl-16">
				@if($data->object->hasFeatured())
					<div class="col-md-6">
						@include('_img.lazy', ['lzobj' => $data->object->getFeatured(), 'lzw' => 1280, 'lzh' => 960, 'ar' => '4x3', 'cl' => 'rounded-3 shadow-sm'])
					</div>
					<div class="col-lg-5 col-md-6 offset-lg-1 d-flex">
						<div class="align-self-center ps-lg-0 ps-md-24">

							<h1 class="h1 mb-lg-24 mb-16">{{ $data->object->title }}</h1>

							<p class="mb-24 pb-lg-16 fs-lg">{!! $data->object->body !!}</p>

							@if(array_key_exists('about', $data->eroutes['page']))
								<a href="{{ route($data->eroutes['page']['about']) }}"
								   class="btn btn-lg btn-outline-primary">More about us</a>
							@endif

						</div>
					</div>
				@else
					<div class="col-12 d-flex">
						<div class="align-self-center ps-lg-0 ps-md-24">

							<h1 class="h1 mb-lg-24 mb-16">{{ $data->object->title }}</h1>

							<p class="mb-24 pb-lg-16 fs-lg">{!! $data->object->body !!}</p>

							@if(array_key_exists('about', $data->eroutes['page']))
								<a href="{{ route($data->eroutes['page']['about']) }}"
								   class="btn btn-lg btn-outline-primary">More about us</a>
							@endif

						</div>
					</div>
				@endif
			</div>
		</section>
	@endif

	<!-- Solutions -->
	<section class="container mb-48 pb-lg-48 pb-md-24 pb-16">

		<h2 class="h1 mb-lg-48 mb-24 pb-lg-0 pb-md-8 text-center">Сustom Software Solutions</h2>

		<div class="swiper-aos" data-aos="fade-up">
			<div class="js-swiper swiper mb-xl-16" data-swiper-options='{
	          "spaceBetween": 24,
	          "speed": 800,
	          "autoplay": {
	            "delay": 5000,
	            "disableOnInteraction": false
			  },
	          "breakpoints": {
	            "0": {
	              "slidesPerView": 1
	            },
	            "500": {
	              "slidesPerView": 2
	            },
	            "768": {
	              "slidesPerView": 3
	            },
	            "1200": {
	              "slidesPerView": 4
	            }
	          },
	          "pagination": {
	            "el": ".swiper-pagination",
	            "clickable": true
	          }
	        }'>
				<div class="swiper-wrapper">
					@include('larawidget', ['hook' => 'home1'])
					@include('larawidget', ['hook' => 'home2'])
					@include('larawidget', ['hook' => 'home3'])
					@include('larawidget', ['hook' => 'home4'])
				</div>
				<div class="swiper-pagination position-static mt-24 pt-lg-16 pt-8"></div>
			</div>
		</div>
	</section>

	<!-- Case studies -->
	<section>
		@widget('sliderWidget', ['term' => 'cases', 'grid' => $data->grid, 'sliderclass' => 'home-cases'])
	</section>

	<!-- Our Services -->
	<section class="container my-48 py-lg-48 py-md-24 pt-8 pb-16">
		@widget('entityCacheWidget', ['resource_slug' => 'services', 'parent' => 'home', 'term' => '', 'needs_image' =>
		true, 'count' => 3, 'grid' => $data->grid])
	</section>

	<!-- Comparison slider -->
	<section class="d-flex w-100 position-relative overflow-hidden">
		<div class="position-relative flex-xl-shrink-0 zindex-5 start-50 translate-middle-x" style="max-width: 1920px;">
			<div class="mx-md-n48 mx-xl-0">
				<div class="mx-n24 mx-sm-n48 mx-xl-0">
					<div class="mx-n48 mx-xl-0">
						<img-comparison-slider class="mx-n48 mx-xl-0">
							{!! Theme::img('images/dark-mode.jpg', 'Dark Mode', '', ['slot' => 'first']) !!}
							{!! Theme::img('images/light-mode.jpg', 'Light Mode', '', ['slot' => 'second']) !!}
							<div slot="handle" style="width: 36px;">
								<svg class="text-primary shadow-primary rounded-circle" width="36" height="36"
								     xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 36 36">
									<g>
										<circle fill="currentColor" cx="18" cy="18" r="18"/>
									</g>
									<path fill="#fff"
									      d="M22.2,17.2h-8.3v-3.3L9.7,18l4.2,4.2v-3.3h8.3v3.3l4.2-4.2l-4.2-4.2V17.2z"/>
								</svg>
							</div>
						</img-comparison-slider>
					</div>
				</div>
			</div>
		</div>
		<div class="position-absolute top-0 start-0 w-50 h-100 bg-dark"></div>
		<div class="position-absolute top-0 end-0 w-50 h-100" style="background-color: #f3f6ff;"></div>
	</section>

	<!-- Testimonial -->
	<section class="container mb-48 pt-72 pb-lg-48 pb-md-24 pb-16">
		<div class="mb-xl-16">
			@widget('entityCacheWidget', ['resource_slug' => 'testimonials', 'parent' => 'home', 'term' => 'home',
			'needs_image'
			=> true, 'count' => 3, 'grid' => $data->grid])
		</div>
	</section>

	<!-- Brands -->
	<section class="container pb-48">
		@widget('entityCacheWidget', ['resource_slug' => 'portfolios', 'parent' => 'home', 'term' => '', 'needs_image' =>
		true, 'count' => 20, 'grid' => $data->grid])
	</section>

	<!-- Blogs -->
	<section class="bg-secondary border-bottom border-light py-48">
		<div class="container py-md-16 py-lg-48">
			@widget('entityCacheWidget', ['resource_slug' => 'blogs', 'parent' => 'home', 'term' => 'home-blog-widget',
			'needs_image' => true, 'count' => 4, 'grid' => $data->grid])
		</div>
	</section>

@endsection

@section('scripts-after')
	{!! Theme::js('vendor/img-comparison-slider/img-comparison-slider.js') !!}
@endsection
