<div class="mt-24 pt-lg-8 pb-16">

	<a href="{{ $data->entityListUrl }}"
	   class="btn btn-outline-primary ms-16 px-14 py-10 float-end">
		<i class="far fa-lg fa-angle-left"></i>
	</a>

	<h1 class="pb-16">{{ $data->object->title }}</h1>

	{{-- YOUTUBE VIDEO --}}
	@if($data->object->hasVideos())
		<div class="ratio ratio-16x9 mt-48 mb-48">
			<iframe width="560" height="315"
			        src="https://www.youtube.com/embed/{{ $data->object->getVideo()->youtubecode }}?rel=0"
			        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		</div>
	@endif

	{{-- FEATURED IMAGE --}}
	@if($data->object->hasFeatured())
		<figure class="mb-48">
			@include('_img.lazy', ['lzobj' => $data->object->getFeatured(), 'lzw' => 1280, 'lzh' => 640, 'ar' => '2x1', 'fc' => false])
		</figure>
	@endif

	{{-- BODY TEXT --}}
	{!! $data->object->body !!}

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

</div>



