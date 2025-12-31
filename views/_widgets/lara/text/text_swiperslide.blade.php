@if($larawidget)
	<div class="swiper-slide h-auto">
		<div class="card h-100">
			<div class="card-body my-md-48 my-24 py-xl-8 py-md-0 py-sm-8 text-center">
				@if($larawidget->hasFeatured())
					@include('_img.glide', ['media' => $larawidget->featured(), 'width' => 960, 'height' => 960, 'dwidth' => 40, 'dheight' => 40, 'ratio' => '1x1', 'class' => 'd-block', 'cntclass' => 'mx-auto mb-16' ])
				@endif

				<h4 class="h5 mb-16">{{ $larawidget->title }}</h4>

				<p class="mb-0">{!! $larawidget->body !!}</p>

			</div>
		</div>
	</div>
@endif
