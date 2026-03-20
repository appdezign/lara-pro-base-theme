@if(!empty($widgetObjects))

	<section class="lara-section py-12 md:my-4 lg:my-12">
		<div class="container">

			<h2 class="h1 text-center pt-1 pb-4 mb-4 lg:mb-6">
				{{ $larawidget->title }}
			</h2>

			{!! $larawidget->body !!}

			<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

				@foreach($widgetObjects as $widgetObject)

					<div class="card border-none" data-aos="fade-up">
						<a href="{{ route($eroutes->entity['teams'] . '.show', ['slug' => $widgetObject->slug]) }}" class="block">

							@if($widgetObject->hasThumb())
								@include('_img.glide', ['media' => $widgetObject->thumb(), 'width' => 960, 'height' => 960, 'ratio' => 'square', 'class' => 'rounded-lg'])
							@endif

							<div class="card-body text-center pt-2">
								<h3 class="text-lg font-semibold mb-0">
									{{ $widgetObject->firstname.' '.$widgetObject->middlename.' '.$widgetObject->title }}
								</h3>

								<p class="text-sm mb-0">{{ $widgetObject->role }}</p>

							</div>
						</a>
					</div>

				@endforeach

			</div>

		</div>
	</section>

@endif
