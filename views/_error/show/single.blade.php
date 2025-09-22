<?php if ($data->gridvars) require($data->gridvars); ?>
<?php if ($data->override) require($data->override); ?>

<section class="{{ $grd->module }} pt-0">
	<div class="{{ $grd->container }}">

		<div class="row">

			{{-- Sidebar Left --}}
			@includeWhen($grd->hasSidebarLeft, $grd->leftSidebar)

			<div class="{{ $grd->contentCols }} main-content">

				<div class="row">
					<div class="{{ $grd->gridColumns }} text-center">

						<h1 class="lara-object-title">{{ $data->object->title }}</h1>

						{{-- BODY TEXT --}}
						{!! $data->object->body !!}

						<div class="row mt-72 mb-72">
							<div class="col-12 text-center">
								<a href="/" class="btn btn-primary">
									<i class="far fa-lg fa-angle-left me-12"></i> Home
								</a>
							</div>
						</div>

					</div>
				</div>

			</div>

			{{-- Sidebar Right --}}
			@includeWhen($grd->hasSidebarRight, $grd->rightSidebar)

		</div>

	</div>
</section>

<section class="bg-secondary border-bottom border-light py-48">
	<div class="container py-md-16 py-lg-48">
		@widget('entityCacheWidget', ['resource_slug' => 'blogs', 'parent' => 'home', 'term' => 'home-blog-widget',
		'needs_image' => true, 'count' => 4, 'grid' => $data->grid])
	</div>
</section>

@include('larawidget', ['hook' => 'content_bottom'])