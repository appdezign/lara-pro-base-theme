@extends('layout')

@section('head-after')
	<link media="all" type="text/css" rel="stylesheet" href="https://demo.laracms.nl/assets/themes/demo/vendor/img-comparison-slider/img-comparison-slider.css">
@endsection

@section('content')

	<section class="pt-24 pb-12">
		<div class="container">
			@include('content.home._partials.content')
		</div>
	</section>

	<section class="py-12">
		<div class="container">
			@include('content.home._partials.solutions')
		</div>
	</section>

	<section class="py-12">
		@widget('sliderWidget', ['term' => 'cases', 'grid' => $data->grid, 'sliderclass' => 'home-cases'])
	</section>

	<section class="py-12">
		<div class="container">
			@widget('entityWidget', ['resource_slug' => 'services', 'parent' => 'home', 'term' => '', 'needs_image' => true, 'count' => 3, 'grid' => $data->grid])
		</div>
	</section>

	<section class="py-12">
		@include('content.home._partials.comparison')
	</section>

	<section class="py-12">
		<div class="container">
			@widget('entityWidget', ['resource_slug' => 'testimonials', 'parent' => 'home', 'term' => 'home',
			'needs_image' => true, 'count' => 3, 'grid' => $data->grid])
		</div>
	</section>

	<section class="py-12">
		<div class="container">
			@widget('entityWidget', ['resource_slug' => 'portfolios', 'parent' => 'home', 'term' => '', 'needs_image' => true, 'count' => 20, 'grid' => $data->grid])
		</div>
	</section>

	<section class="bg-secondary py-12">
		<div class="container">
			@widget('entityWidget', ['resource_slug' => 'blogs', 'parent' => 'home', 'term' => 'home-blog-widget', 'needs_image' => true, 'count' => 4, 'grid' => $data->grid])
		</div>
	</section>

@endsection

@section('scripts-after')
	@parent
	<script src="https://demo.laracms.nl/assets/themes/demo/vendor/img-comparison-slider/img-comparison-slider.js"></script>
@endsection