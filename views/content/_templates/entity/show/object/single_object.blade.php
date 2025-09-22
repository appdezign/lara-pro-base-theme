<div class="mt-24 pt-lg-8 pb-16">
	<a href="{{ $data->entityListUrl }}"
	   class="btn btn-outline-primary ms-16 px-14 py-10 float-end">
		<i class="far fa-lg fa-angle-left"></i>
	</a>
	<h1 class="pb-16">{{ $data->page->title }}</h1>
</div>

<div class="row">
	<div class="col-md-6">

		{!! $data->object->lead !!}

		{!! $data->object->body !!}

	</div>
	<div class="col-md-6">
		@if($data->object->hasFeatured())
			<div class="bg-secondary rounded-3">
				@include('_img.lazy', ['lzobj' => $data->object->getFeatured(), 'lzw' => 1280, 'lzh' => 960, 'ar' => '4x3'])
			</div>
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
