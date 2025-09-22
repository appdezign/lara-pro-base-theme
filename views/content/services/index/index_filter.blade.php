<?php if ($data->gridvars) require($data->gridvars); ?>
<?php if ($data->override) require($data->override); ?>

@include('larawidget', ['hook' => 'content_top'])

<section class="{{ $grd->module }}">
	<div class="{{ $grd->container }}">

		<div class="row">
			<div class="col-12 col-lg-9 offset-lg-3">
				{{-- Page Title --}}
				<div class="row">
					<div class="{{ $grd->gridColumns }}">

						<div class="page-title">
							<h1 class="mb-48">{{ $data->page->title }}</h1>
						</div>

					</div>
				</div>
			</div>
		</div>

		<div class="row">

			{{-- Force Sidebar Left --}}
			@include('content._sidebars.left_tags')

			<div class="col-lg-9 main-content">

				{{-- Tag children --}}
				@if(!empty($data->children))
					<div class="row">
						<div class="{{ $grd->gridColumns }}">
							<ul>
								@foreach($data->children as $child)
									<li>
										<a href="{{ route($activeroute->getPrefix() .'.' . $entity->getResourceSlug() . '.'. $child->route . '.index') }}">{{ $child->title }}</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				@endif

				{{-- Filtered Object List --}}
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
								<div class="row">
									<div class="col-sm-12">
										@include('content.' . $entity->getResourceSlug() . '.index.object.list_object')
									</div>
								</div>
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

		</div>

	</div>
</section>

@include('larawidget', ['hook' => 'content_bottom'])