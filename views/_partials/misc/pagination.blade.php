@if ($paginator->hasPages())

	<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-center pt-lg-3 pt-1">

			{{-- Previous Page Link --}}
			@if ($paginator->onFirstPage())
				<li class="page-item disabled">
					 <span class="page-link">
						<i class="far fa-chevron-left fs-14 mx-n1"></i>
					 </span>
				</li>
			@else
				<li class="page-item">
					<a href="{{ $paginator->previousPageUrl() }}" class="page-link">
						<i class="far fa-chevron-left fs-14 mx-n1"></i>
					</a>
				</li>
			@endif

			{{-- Mobile --}}
			<li class="page-item disabled d-sm-none">
				<span class="page-link text-body">
					{{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}
				</span>
			</li>

			{{-- Pagination Elements (hidden on mobile) --}}
			@foreach ($elements as $element)

				{{-- "Three Dots" Separator --}}
				@if (is_string($element))
					<li class="page-item active d-none d-sm-block">
						<span class="page-link">{{ $element }}</span>
					</li>
				@endif

				{{-- Array Of Links --}}
				@if (is_array($element))
					@foreach ($element as $page => $url)
						@if ($page == $paginator->currentPage())
							<li class="page-item active d-none d-sm-block">
								<span class="page-link">
									{{ $page }}
								</span>
							</li>
						@else
							<li class="page-item d-none d-sm-block">
								<a href="{{ $url }}" class="page-link">
									{{ $page }}
								</a>
							</li>
						@endif
					@endforeach
				@endif
			@endforeach

			{{-- Next Page Link --}}
			@if ($paginator->hasMorePages())
				<li class="page-item">
					<a href="{{ $paginator->nextPageUrl() }}" class="page-link">
						<i class="far fa-chevron-right fs-14 mx-n1"></i>
					</a>
				</li>
			@else
				<li class="page-item disabled">
					<span class="page-link">
						<i class="far fa-chevron-right fs-14 mx-n1"></i>
					</span>
				</li>
			@endif

		</ul>
	</nav>

@endif
