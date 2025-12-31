@if($larawidget)

	@if($larawidget->hasFeatured())
		<div class="navbar-brand text-dark p-0 me-0 mb-16 mb-lg-24">
			@include('_img.glide', ['media' =>  $larawidget->featured(), 'width' => 960, 'height' => 960, 'ratio' => '1x1', 'class' => 'object-cover' ])
			{{ $larawidget->title }}
		</div>
	@else
		{{ $larawidget->title }}
	@endif


	{!! $larawidget->body !!}
@endif
