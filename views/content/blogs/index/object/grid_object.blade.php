<article class="card border-0 shadow-md h-full">

	<div class="relative">
		@if($obj->hasThumb())
			@include('_img.glide', ['media' => $obj->thumb(), 'width' => 1280, 'height' => 960, 'ratio' => '4/3', 'class' => 'rounded-t-sm' ])
		@else
			@include('_img.placeholder', ['phw' => 800, 'phh' => 600, 'phar' => '4/3', 'phbg' => 'e8ecf0', 'phcol' => 'd4d8dc'])
		@endif
		<a href="{{ route($activeroute->getSingleRoute(), $obj->routeVars) }}"
		   class="absolute top-0 start-0 w-full h-full"
		   aria-label="Read more"></a>
	</div>

	<div class="card-body">

		<div class="flex justify-between items-center mb-2">
			<span class="text-sm text-gray-600 pe-4 me-4">
				{{ Date::parse($obj->publish_from)->format('j F Y') }}
			</span>
			@foreach($obj->tags->where('taxonomy_id', 2) as $tag)
				<a href="#" class="px-2 py-1 text-sm text-gray-600 bg-secondary no-underline">{{ $tag->title }}</a>
			@endforeach
		</div>

		<h3 class="h5 mb-0">
			<a href="{{ route($activeroute->getSingleRoute(), $obj->routeVars) }}" class="text-gray-800 hover:text-primary">
				{{ $obj->title }}
			</a>
		</h3>
	</div>
</article>
