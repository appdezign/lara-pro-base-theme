<div class="row">
	<div class="{{ $grid->contentCols }}">
		<ol class="breadcrumb mb-0">
			@foreach($breadcrumb as $crumb)
				<li class="breadcrumb-item">
					<a href="{{ $crumb['route'] }}">
						@if($loop->index == 0)
							<i class="fal fa-home fs-14 me-5"></i>
						@endif
						{{ $crumb['title'] }}
					</a>
				</li>
			@endforeach
		</ol>
	</div>
</div>
