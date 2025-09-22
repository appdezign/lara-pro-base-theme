@if($larawidget)

	@if($larawidget->hasFeatured())
		<div class="navbar-brand text-dark p-0 me-0 mb-16 mb-lg-24">
			@include('_img.lazy', ['lzobj' => $larawidget->getFeatured(), 'lzw' => 960, 'lzh' => 960, 'dw' => '48', 'dh' => 48, 'ar' => '1x1', 'fc' => false])
			{{ $larawidget->title }}
		</div>
	@else
		{{ $larawidget->title }}
	@endif


	{!! $larawidget->body !!}
@endif
