<article class="card border-0 shadow-md h-full">

	<div class="relative">
		@if($obj->hasVideos())
			@include('_img.youtube', ['ytcode' => $obj->getVideo()->youtubecode, 'ytsize' => 'maxresdefault', 'ytw' => 1280, 'yth' => 720])
		@endif
		<a href="{{ route($activeroute->getSingleRoute(), $obj->routeVars) }}"
		   class="absolute top-0 start-0 w-full h-full"
		   aria-label="Read more"></a>
	</div>

	<div class="card-body text-center">
		<h3 class="h5 mb-0">
			<a href="{{ route($activeroute->getSingleRoute(), $obj->routeVars) }}" class="text-gray-800 hover:text-primary">
				{{ $obj->title }}
			</a>
		</h3>
	</div>
</article>
