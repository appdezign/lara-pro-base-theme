<?php if($data->gridvars) require($data->gridvars); ?>
<?php if($data->override) require($data->override); ?>

@include('larawidget', ['hook' => 'content_top'])

<section class="{{ $grd->module }}">
	<div class="{{ $grd->container }}">

		<div class="row">

			{{-- Sidebar Left --}}
			@includeWhen($grd->hasSidebarLeft, 'content._sidebars.left_default')

			<div class="{{ $grd->contentCols }} main-content">

				<div class="row">
					<div class="{{ $grd->gridColumns }}">

						@if($data->object->template == 'standard' || $data->object->template == '')
							@include('content.pages.show.object.single_object')
						@else
							@include('content.pages.show.object.single_' . $data->object->template)
						@endif

					</div>
				</div>

			</div>

			{{-- Sidebar Right --}}
			@includeWhen($grd->hasSidebarRight, 'content._sidebars.right_default')

		</div>

	</div>
</section>

@include('larawidget', ['hook' => 'content_bottom'])