@if($larawidget)

	@if($larawidget->hasFeatured())
		<div class="flex items-center gap-2 text-white text-xl font-bold mb-4 lg:mb-6">
			@include('_img.glide', ['media' =>  $larawidget->featured(), 'width' => 96, 'height' => 96, 'dwidth' => 48, 'dheight' => 48, 'ratio' => 'square', 'class' => 'object-cover' ])
			{{ $larawidget->title }}
		</div>
	@else
		{{ $larawidget->title }}
	@endif

	<div class="opacity-80">
		{!! $larawidget->body !!}
	</div>
@endif
