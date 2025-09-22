<?php if ($data->gridvars) require($data->gridvars); ?>
<?php if ($data->override) require($data->override); ?>

<section class="{{ $grd->module }}">
	<div class="{{ $grd->container }}">

		<div class="row">

			{{-- Sidebar Left --}}
			@includeWhen($grd->hasSidebarLeft, $grd->leftSidebar)

			<div class="{{ $grd->contentCols }} main-content">

				<div class="row">
					<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">

						<h1 class="lara-object-title">{{ $data->page->title }}</h1>

						{!! $data->page->body !!}

					</div>
				</div>

				<div class="row">
					<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
						@include('_user.profile.show.form.form')
					</div>
				</div>

			</div>

			{{-- Sidebar Right --}}
			@includeWhen($grd->hasSidebarRight, $grd->rightSidebar)

		</div>

	</div>
</section>
