@if($larawidget)

	<div class="swiper-slide !h-auto p-2">
		<div class="card bg-base-100 w-full h-full shadow-sm">
			@if($larawidget->hasFeatured())
				<figure class="px-10 pt-10">
					@include('_img.glide', ['media' => $larawidget->featured(), 'width' => 960, 'height' => 960, 'dwidth' => 40, 'dheight' => 40, 'ratio' => 'square' ])
				</figure>
			@endif
			<div class="card-body items-center text-center pb-12">
				<h2 class="heading text-xl card-title">{{ $larawidget->title }}</h2>
				{!! $larawidget->body !!}
			</div>
		</div>
	</div>

@endif
