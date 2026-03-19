<div class="flex mt-6">
	<h1 class="h1 grow-1">{{ $data->object->title }}</h1>
	@if($data->entityListUrl)
		<a href="{{ $data->entityListUrl }}"
		   class="btn btn-square btn-outline btn-primary ms-4">
			<x-heroicon-o-chevron-left class="w-5 h-5"/>
		</a>
	@endif
</div>

{{-- MEDIA GALLERY --}}
@if($data->object->hasGallery())
	@include('content._partials.object_gallery')
@endif
