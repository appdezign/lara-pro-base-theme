@if(!empty($data->relatedObjects))

	<div class="mt-48 mb-48 text-center">
		<div class="divider-line"></div>
	</div>

	{{ _q('lara-front::default.headers.related_pages') }}:

	<ul class="object-related-pages">
		@foreach($data->relatedObjects as $relobj)

			<?php $relatedObjectUrl = ($relobj->url) ? $relobj->url : route($relobj->route, $relobj->params); ?>

			<li>
				<a href="{{ $relatedObjectUrl }}" target="{{ $relobj->target }}">
					{{ $relobj->title }}
				</a>
			</li>
		@endforeach
	</ul>

@endif
