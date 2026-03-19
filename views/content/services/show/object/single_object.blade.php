<div class="flex mt-6">
	<h1 class="h1 grow-1">{{ $data->object->title }}</h1>
	@if($data->entityListUrl)
		<a href="{{ $data->entityListUrl }}"
		   class="btn btn-square btn-outline btn-primary ms-4">
			<x-heroicon-o-chevron-left class="w-5 h-5"/>
		</a>
	@endif
</div>

<div class="grid grid-cols-12 gap-12">
	<div class="col-span-12 md:col-span-6">

		{!! $data->object->lead !!}

		<style>
			.rich-content-body ul {
				display: flex;
				justify-content: space-between;
			}
			.rich-content-body ul li {
				font-weight: bold;
			}
		</style>

		<div class="rich-content-body">
			{!! $data->object->body !!}
		</div>

	</div>

	<div class="col-span-12 md:col-span-6">
		@if($data->object->hasFeatured())
			<figure class="bg-secondary rounded-lg">
				@include('_img.glide', ['media' => $data->object->featured(), 'width' => 1280, 'height' => 960, 'ratio' => '4/3', 'class' => 'object-cover' ])
			</figure>
		@endif
	</div>

</div>


{{-- RELATED --}}
@if($entity->hasRelated())
	@include('content._partials.object_related')
@endif
{{-- FILES --}}
@if($data->object->hasFiles())
	@include('content._partials.object_files')
@endif

{{-- MEDIA GALLERY --}}
@if($data->object->hasGallery())
	@include('content._partials.object_gallery')
@endif
