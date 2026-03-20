<article class="card border-0 shadow-md overflow-hidden mb-8">
	<div class="grid grid-cols-12 gap-0">

		@if($obj->hasThumb())
			<div class="col-span-12 md:col-span-4 relative bg-center bg-no-repeat bg-cover"
			     style="background-image: url({!! glideUrl($obj->thumb()->path, 640, 640) !!}); min-height: 15rem;">
				<a href="{{ route($activeroute->getSingleRoute(), $obj->routeVars) }}"
				   class="absolute top-0 start-0 w-full h-full" aria-label="Read more"></a>
			</div>
		@else
			<div class="col-span-12 md:col-span-4 relative bg-center bg-no-repeat bg-cover"
			     style="background-image: url('https://dummyimage.com/960x960/e8ecf0/d4d8dc?text=Lara+CMS'); min-height: 15rem;">
				<a href="{{ route($activeroute->getSingleRoute(), $obj->routeVars) }}"
				   class="absolute top-0 start-0 w-full h-full" aria-label="Read more"></a>
			</div>
		@endif

		<div class="col-span-12 md:col-span-8">
			<div class="card-body">

				<h3 class="h4">
					<a href="{{ route($activeroute->getSingleRoute(), $obj->routeVars) }}"
					   class="text-gray-800 no-underline">
						{{ $obj->title }}
					</a>
				</h3>

				{!! $obj->lead !!}

			</div>
		</div>

	</div>
</article>

