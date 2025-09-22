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
				<div class="row">
					<div class="{{ $grd->gridColumns }}">

						<div class="d-flex justify-content-between mb-48">
							<div class="page-title">
								<h1 class="mb-2 mb-md-0">{{ $data->page->title }}</h1>
							</div>
							<div class="d-none d-lg-flex align-items-center">
								<a href="{{ route($activeroute->getPrefix() . '.' . $entity->getResourceSlug().'.index', ['view' => 'list']) }}"
								   class="nav-link me-16 p-0 @if(!$isGrid) active @endif">
									<i class="fas fa-list @if(!$isGrid) color-primary @else text-muted @endif"></i>
								</a>
								<a href="{{ route($activeroute->getPrefix() . '.' . $entity->getResourceSlug().'.index', ['view' => 'grid']) }}"
								   class="nav-link p-0 @if($isGrid) active @endif">
									<i class="fas fa-th @if($isGrid) color-primary @else text-muted @endif"></i>
								</a>
							</div>
						</div>

					</div>
				</div>

				{{-- Render tree with objects recursively --}}
				<div class="row">
					<div class="{{ $grd->gridColumns }}">
						<ul class="object-tree">
							@foreach($data->objects as $taxonomy => $tags)
								@foreach($tags as $node)
									@include('content._partials.sort_by_tag_' . $data->params->getListType() . '_render', $node)
								@endforeach
							@endforeach
						</ul>
					</div>
				</div>
			</div>

			{{-- Sidebar Right --}}
			@includeWhen($grd->hasSidebarRight, $grd->rightSidebar)

		</div>

	</div>
</section>

@include('larawidget', ['hook' => 'content_bottom'])