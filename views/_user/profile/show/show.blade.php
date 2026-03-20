<?php if ($data->gridvars) require($data->gridvars); ?>
<?php if ($data->override) require($data->override); ?>

<section class="{{ $grd->module }}">
	<div class="{{ $grd->container }}">

		<div class="grid grid-cols-12">

			{{-- Sidebar Left --}}
			@includeWhen($grd->hasSidebarLeft, $grd->leftSidebar)

			<div class="{{ $grd->contentCols }} main-content">

				<div class="grid grid-cols-12">
					<div class="col-span-12 md:col-span-10 mdcol-start-2 lg:col-span-8 lg:col-start-3 xl:col-span-6 xl:col-start-4">

						<h1 class="mb-8">{{ $data->page->title }}</h1>

						{!! $data->page->body !!}

					</div>
				</div>

				<div class="grid grid-cols-12">
					<div class="col-span-12 md:col-span-10 mdcol-start-2 lg:col-span-8 lg:col-start-3 xl:col-span-6 xl:col-start-4">
						@include('_user.profile.show.form.form')
					</div>
				</div>

			</div>

			{{-- Sidebar Right --}}
			@includeWhen($grd->hasSidebarRight, $grd->rightSidebar)

		</div>

	</div>
</section>
