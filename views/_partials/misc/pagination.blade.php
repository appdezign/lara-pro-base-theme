@if ($paginator->hasPages())

	<div class="pagination join">
		@if($paginator->onFirstPage())
			<a class="join-item btn btn-disabled">
				<x-heroicon-o-chevron-left class="w-4 h-4"/>
			</a>
		@else
			<a href="{{ $paginator->previousPageUrl() }}" class="join-item btn">
				<x-heroicon-o-chevron-left class="w-4 h-4"/>
			</a>
		@endif

		{{-- Mobile --}}
		<a class="join-item btn btn-disabled bg-white text-gray-600 border-1 border-gray-200 sm:hidden">
			{{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}
		</a>

		{{-- Pagination Elements (hidden on mobile) --}}
		@foreach ($elements as $element)

			{{-- "Three Dots" Separator --}}
			@if (is_string($element))
				<a class="join-item btn btn-disabled bg-white text-gray-600 border-1 border-gray-200 sm:hidden">
					{{ $element }}
				</a>
			@endif

			{{-- Array Of Links --}}
			@if (is_array($element))
				@foreach ($element as $page => $url)
					@if ($page == $paginator->currentPage())
						<a class="join-item btn btn-active hidden sm:flex">
							{{ $page }}
						</a>
					@else
						<a href="{{ $url }}" class="join-item btn hidden sm:flex">
							{{ $page }}
						</a>
					@endif
				@endforeach
			@endif
		@endforeach


		@if ($paginator->hasMorePages())
			<a href="{{ $paginator->nextPageUrl() }}" class="join-item btn">
				<x-heroicon-o-chevron-right class="w-4 h-4"/>
			</a>
		@else
			<a class="join-item btn btn-disabled">
				<x-heroicon-o-chevron-right class="w-4 h-4"/>
			</a>
		@endif
	</div>

@endif
