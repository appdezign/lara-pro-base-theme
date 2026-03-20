@if($larawidget)
	<div class="grid grid-cols-12">
		<div class="col-span-12 sm:col-span-6 sm:col-start-4">
			<div class="text-center">
				<h3 class="text-uppercase">{{ $larawidget->title }}</h3>
				<p class="lead divider-line">{!! $larawidget->body !!}</p>
			</div>
		</div>
	</div>

	@if($larawidget->hasFeatured())
		<div class="grid grid-cols-12">
			<div class="col-span-12 sm:col-span-6 sm:col-start-4">
				<div class="text-center my-6">
					@include('_img.glide', ['media' => $larawidget->featured(), 'width' => 1280, 'height' => 720, 'ratio' => '16x9', 'class' => 'object-cover' ])
				</div>
			</div>
		</div>
	@endif
@endif
