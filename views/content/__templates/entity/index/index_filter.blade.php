<?php if ($data->gridvars) require($data->gridvars); ?>
<?php if ($data->override) require($data->override); ?>

@include('larawidget', ['hook' => 'content_top'])

<section class="{{ $grd->module }}">
	<div class="{{ $grd->container }}">

		<div class="grid grid-cols-12">
			<div class="col-span-12 {{ $grd->contentCols }} lg:col-start-4">

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

			</div>
		</div>

		<div class="grid grid-cols-12 gap-4">

			{{-- Force Sidebar Left --}}
			@include('content._sidebars.left_tags')

			<div class="col-span-12 {{ $grd->contentCols }} main-content">

				{{-- Tag children --}}
				@if(!empty($data->children))
					<div class="grid grid-cols-12">
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