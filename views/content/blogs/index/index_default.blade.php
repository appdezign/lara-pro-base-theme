<?php if ($data->gridvars) require($data->gridvars); ?>
<?php if ($data->override) require($data->override); ?>

@include('larawidget', ['hook' => 'content_top'])

<section class="{{ $grd->module }}">
	<div class="{{ $grd->container }}">

		<div class="row">

			{{-- Sidebar Left --}}
			@includeWhen($grd->hasSidebarLeft, $grd->leftSidebar)

			<div class="{{ $grd->contentCols }} main-content">

				{{-- Page Title --}}
				<div class="row mb-48">
					<div class="{{ $grd->gridColumns }}">
						<div class="page-title">
							<h1 class="mb-2 mb-md-0">{{ $data->page->title }}</h1>
						</div>
					</div>
				</div>

				{{-- Object List --}}
				@if($isGrid)
					<div class="row">
						<div class="{{ $grd->gridColumns }}">
							<div class="row @if($data->params->getGridCols() > 1) row-cols-lg-{{ $data->params->getGridCols() }} @else row-cols-lg-3 @endif row-cols-sm-2 row-cols-1 gy-md-24 gy-8">
								@foreach($data->objects as $obj)
									<div class="col pb-3">
										@include('content.' . $entity->getResourceSlug() . '.index.object.grid_object')
									</div>
								@endforeach
							</div>
						</div>
					</div>
				@else
					<div class="row">
						<div class="{{ $grd->gridColumns }}">
							@foreach($data->objects as $obj)
								@include('content.' . $entity->getResourceSlug() . '.index.object.list_object')
							@endforeach
						</div>
					</div>
				@endif

				{{-- Pagination --}}
				@if($data->params->getPaginate())
					<div class="row mt-48">
						<div class="{{ $grd->gridColumns }} text-center">
							{{ $data->objects->links('_partials.misc.pagination') }}
						</div>
					</div>
				@endif

			</div>

			{{-- Sidebar Right --}}
			@includeWhen($grd->hasSidebarRight, $grd->rightSidebar)

		</div>

	</div>
</section>

@include('larawidget', ['hook' => 'content_bottom'])