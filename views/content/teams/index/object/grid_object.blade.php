<article class="card border-0 shadow-sm h-100">
	<div class="position-relative">
		@if($obj->hasThumbOrFeatured())
			@include('_img.lazy', ['lzobj' => $obj->getThumbOrFeatured(), 'lzw' => $teamWidth, 'lzh' => $teamHeight, 'ar' => $teamRatio, 'cl' => 'card-img-top'])
		@else
			@include('_img.placeholder', ['phw' => $teamWidth, 'phh' => $teamHeight, 'phar' => $teamRatio, 'phbg' => 'e8ecf0', 'phcol' => 'd4d8dc'])
		@endif
		<a href="{{ route($activeroute->getActiveRoute() . '.show', $obj->routeVars) }}"
		   class="position-absolute top-0 start-0 w-100 h-100"
		   aria-label="Read more"></a>
	</div>
	<div class="card-body text-center pb-24">
		<h3 class="fs-18 fw-semibold pt-4 mb-8">
			<a href="{{ route($activeroute->getActiveRoute() . '.show', $obj->routeVars) }}"
			   class="text-dark text-decoration-none">
				{{ $obj->title }}
			</a>
		</h3>
		<p class="fs-14 mb-0">{{ $obj->role }}</p>
	</div>

</article>
