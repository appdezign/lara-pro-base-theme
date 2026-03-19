<?php if ($data->gridvars) require($data->gridvars); ?>
<?php if ($data->override) require($data->override); ?>

@include('larawidget', ['hook' => 'content_top'])

<section class="{{ $grd->module }}">
	<div class="{{ $grd->container }}">

		<div class="grid grid-cols-12">

			{{-- Sidebar Left --}}
			@includeWhen($grd->hasSidebarLeft, $grd->leftSidebar)

			<div class="{{ $grd->contentCols }} main-content">

				{{-- Page Title --}}
				<div class="grid grid-cols-12 mb-3">
					<div class="{{ $grd->gridColumns }}">
						<h1>{{ $data->page->title }}</h1>

						@if($data->page->hasFeatured())
							<figure class="mb-8">
								@include('_img.glide', ['media' => $data->page->featured(), 'width' => 1280, 'height' => 640, 'ratio' => '2/1', 'class' => 'object-cover' ])
							</figure>
						@endif

						{!! $data->page->body !!}

					</div>
				</div>

				{{-- Object List --}}
				@if($isGrid)
					<div class="grid grid-cols-12">
						<div class="{{ $grd->gridColumns }}">

							<div class="grid sm:grid-cols-2 lg:grid-cols-{{ $data->params->getGridCols() }} gap-6">
								@foreach($data->objects as $obj)
									@include('content.' . $entity->getResourceSlug() . '.index.object.grid_object')
								@endforeach
							</div>

						</div>
					</div>
				@else
					<div class="grid grid-cols-12">
						<div class="{{ $grd->gridColumns }}">

							@foreach($data->objects as $obj)
								@include('content.' . $entity->getResourceSlug() . '.index.object.list_object')
							@endforeach

						</div>
					</div>
				@endif

				{{-- Pagination --}}
				@if($data->params->getPaginate())
					<div class="grid grid-cols-12 mt-12">
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