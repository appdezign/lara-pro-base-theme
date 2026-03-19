<?php if ($data->gridvars) require($data->gridvars); ?>
<?php if ($data->override) require($data->override); ?>

<section class="{{ $grd->module }}">
	<div class="{{ $grd->container }}">

		<div class="row">

			{{-- Sidebar Left --}}
			@includeWhen($grd->hasSidebarLeft, 'content._sidebars.left_default')

			<div class="{{ $grd->contentCols }} main-content">

				<div class="row">
					<div class="{{ $grd->gridColumns }}">
						<h1>{{ $data->page->title }}</h1>
						@include('content.' . $entity->getResourceSlug() . '.show.form.form')
					</div>
				</div>

			</div>

			{{-- Sidebar Right --}}
			@includeWhen($grd->hasSidebarRight, 'content._sidebars.right_default')

		</div>

	</div>
</section>
