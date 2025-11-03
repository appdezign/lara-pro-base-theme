<?php if($data->gridvars) require($data->gridvars); ?>
<?php if($data->override) require($data->override); ?>

<section class="{{ $grd->module }} pt-0">
	<div class="{{ $grd->container }}">

		<div class="row">

			{{-- Sidebar Left --}}
			@includeWhen($grd->hasSidebarLeft, $grd->leftSidebar)

			<div class="{{ $grd->contentCols }} main-content">

				<div class="row">
					<div class="{{ $grd->gridColumns }}">

						@include('content.' . $entity->getResourceSlug() . '.show.object.single_object')

					</div>
				</div>

				@if($data->params->getPrevNext())
					<div class="row">
						<div class="{{ $grd->gridColumns }}">
							@include('content._partials.single_prevnext')
						</div>
					</div>
				@endif

			</div>

			{{-- Sidebar Right --}}
			@includeWhen($grd->hasSidebarRight, $grd->rightSidebar)

		</div>

	</div>
</section>
