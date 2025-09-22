<article class="card border-0 shadow-sm overflow-hidden mb-36">
	<div class="row g-0">

		@if($entity->hasImages() || $entity->hasVideos())

			@if($obj->hasThumbOrFeatured())
				<div class="col-md-4 position-relative bg-position-center bg-repeat-0 bg-size-cover"
				     style="background-image: url({{ _cimg($obj->getThumbOrFeatured()->filename, 1280, 960) }}); min-height: 15rem;">
					<a href="{{ route($activeroute->getActiveRoute() . '.show', $obj->routeVars) }}"
					   class="position-absolute top-0 start-0 w-100 h-100" aria-label="Read more"></a>
				</div>
			@else
				<div class="col-md-4 position-relative bg-position-center bg-repeat-0 bg-size-cover"
				     style="background-image: url('https://dummyimage.com/960x960/e8ecf0/d4d8dc?text=Lara+CMS'); min-height: 15rem;">
					<a href="{{ route($activeroute->getActiveRoute() . '.show', $obj->routeVars) }}"
					   class="position-absolute top-0 start-0 w-100 h-100" aria-label="Read more"></a>
				</div>
			@endif

			<div class="col-md-8">
				<div class="card-body">

					<h3 class="h4">
						<a href="{{ route($activeroute->getActiveRoute() . '.show', $obj->routeVars) }}">
							{{ $obj->title }}
						</a>
					</h3>
					<p>{!! $obj->lead !!}</p>

				</div>
			</div>

		@else

			<div class="col-12">
				<div class="card-body">
					<div class="d-flex align-items-center mb-16">
						<span class="fs-14 text-muted pe-16 me-16 border-end">
							{{ Date::parse($obj->publish_from)->format('j F Y') }}
						</span>
						@foreach($obj->tags->where('taxonomy_id', 2) as $tag)
							<a href="#"
							   class="badge fs-14 text-nav bg-secondary text-decoration-none">{{ $tag->title }}</a>
						@endforeach
					</div>

					<h3 class="h4">
						<a href="{{ route($activeroute->getActiveRoute() . '.show', $obj->routeVars) }}">
							{{ $obj->title }}
						</a>
					</h3>

					<p>{!! $obj->lead !!}</p>

				</div>
			</div>

		@endif

	</div>
</article>

