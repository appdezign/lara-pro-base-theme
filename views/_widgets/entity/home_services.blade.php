@if($widgetObjects)

	<h2 class="mb-12 text-center">Our Services</h2>

	@foreach ($widgetObjects as $widgetObject)
		<div class="grid grid-cols-12 gap-y-1 mb-12 pb-4 md:pb-6 xl:pb-12">
			<div class="flex col-span-12 md:col-span-6 lg:col-span-5 order-2 md:order-1 ">
				<div class="self-center md:pr-6 lg:pr-0">
					<h4 class="mb-4 md:mb-6">{{ $widgetObject->title }}</h4>
					<p class="mb-4 md:mb-6 text-lg">
						{!! $widgetObject->lead !!}
					</p>
					<hr class="my-4 md:my-6 text-slate-300 border-slate-300">

					<div class="home-service-widget">
						{!! $widgetObject->body !!}
					</div>

					<a href="" class="btn btn-lg btn-outline btn-primary w-full sm:w-auto mt-6">Learn more</a>
				</div>
			</div>
			<div class="col-span-12 md:col-span-6 lg:col-start-7  order-1 md:order-2">
				<div class="bg-secondary rounded-3 mb-4 md:mb-0" data-aos="fade-left">

					@if($widgetObject->hasThumb())
						@include('_img.glide', ['media' => $widgetObject->thumb(), 'width' => 960, 'height' => 720, 'ratio' => '4/3', 'class' => 'object-cover' ])
					@endif
				</div>
			</div>
		</div>
	@endforeach

@endif
