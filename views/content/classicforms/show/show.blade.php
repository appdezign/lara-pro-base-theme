<?php if ($data->gridvars) require($data->gridvars); ?>
<?php if ($data->override) require($data->override); ?>

<section class="{{ $grd->module }}">
	<div class="{{ $grd->container }}">

		<div class="grid grid-cols-12">

			{{-- Sidebar Left --}}
			@includeWhen($grd->hasSidebarLeft, $grd->leftSidebar)

			<div class="{{ $grd->contentCols }} main-content">

				{{-- Page Title --}}
				<div class="grid grid-cols-12">
					<div class="{{ $grd->gridColumns }}">
						<h1 class="mb-2 md:mb-0">{{ $data->page->title }}</h1>
					</div>
				</div>

				<div class="grid grid-cols-12">
					<div class="{{ $grd->gridColumns }}">

						@include('content.' . $entity->getResourceSlug() . '.show.form.form')

					</div>
				</div>

			</div>

		</div>

	</div>
</section>
