@if($larawidget)
	<div class="row">
		<div class="col-sm-6 offset-sm-3">
			<div class="module-header text-center">
				<h3 class="montserrat text-uppercase">{{ $larawidget->title }}</h3>
				<p class="lead divider-line">{!! $larawidget->body !!}</p>
			</div>
		</div>
	</div>

	@if($larawidget->hasFeatured())
		<div class="row">
			<div class="col-sm-10 offset-sm-1">
				<div class="text-center mt-24 mb-24">
					@include('_img.lazy', ['lzobj' => $larawidget->getFeatured(), 'lzw' => 1280, 'lzh' => 720, 'ar' => '16x9'])
				</div>
			</div>
		</div>
	@endif
@endif
