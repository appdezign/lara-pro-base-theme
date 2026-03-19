<?php if ($data->gridvars) require($data->gridvars); ?>
<?php if ($data->override) require($data->override); ?>

@include('larawidget', ['hook' => 'content_top'])

<section class="{{ $grd->module }}">
	<div class="{{ $grd->container }}">

		<div class="grid grid-cols-12">

			{{-- Sidebar Left --}}
			@includeWhen($grd->hasSidebarLeft, $grd->leftSidebar)

			<div class="{{ $grd->contentCols }} main-content">

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

				{{-- Render tree with objects recursively --}}
				<div class="grid grid-cols-12">
					<div class="{{ $grd->gridColumns }}">
						<ul>
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