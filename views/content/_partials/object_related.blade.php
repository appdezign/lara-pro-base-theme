@if(!empty($data->relatedObjects))

	<div class="my-12 text-center">
		<div class="border-b-1 border-b-gray-200"></div>
	</div>

	<p class="my-4 font-bold">{{ ucfirst(_q('lara-front::default.headers.related_pages')) }}:</p>

	<ul class="list-none mb-8">
		@foreach($data->relatedObjects as $relobj)
			@php
				$relatedObjectUrl = $relobj->url ?? route($relobj->route, $relobj->params);
			@endphp
			<li>
				<a href="{{ $relatedObjectUrl }}" target="{{ $relobj->target }}" class="block px-2 py-1 border-b-1 border-b-gray-200 hover:bg-slate-100">
					{{ $relobj->title }}
				</a>
			</li>
		@endforeach
	</ul>

@endif