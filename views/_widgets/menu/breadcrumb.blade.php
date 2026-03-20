<div class="grid grid-cols-12">
	<div class="{{ $grid->contentCols }}">

		<ol class="flex flex-wrap list-none m-0 p-0">
			@foreach($breadcrumb as $crumb)
				<li class="flex items-center">
					<a href="{{ $crumb['route'] }}" class="block px-1 text-sm text-gray-500">
						@if($loop->index == 0)
							<x-heroicon-o-home class="inline-block mb-1 me-2 w-4 h-4"/>
						@endif
						{{ $crumb['title'] }}
						@if(!$loop->last)
							<x-heroicon-s-chevron-right class="inline-block ms-1 w-3 h-3 "/>
						@endif
					</a>
				</li>
			@endforeach
		</ol>

	</div>
</div>
