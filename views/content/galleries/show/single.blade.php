<?php if($data->gridvars) require($data->gridvars); ?>
<?php if($data->override) require($data->override); ?>

<section class="{{ $grd->module }}">
	<div class="{{ $grd->container }}">

		<div class="grid grid-cols-12">

			{{-- Sidebar Left --}}
			@includeWhen($grd->hasSidebarLeft, $grd->leftSidebar)

			<div class="{{ $grd->contentCols }} main-content">

				<div class="grid grid-cols-12">
					<div class="responsive-col-span-8">

						@include('content.' . $entity->getResourceSlug() . '.show.object.single_object')

					</div>
				</div>

				@if($data->params->getPrevNext())
					<div class="grid grid-cols-12">
						<div class="responsive-col-span-8">
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
