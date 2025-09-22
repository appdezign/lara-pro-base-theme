
<div class="mt-24 pt-lg-8 pb-16">

	<a href="{{ $data->entityListUrl }}"
	   class="btn btn-outline-primary ms-16 px-14 py-10 float-end">
		<i class="far fa-lg fa-angle-left"></i>
	</a>

	<h1 class="pb-16">{{ $data->object->title }}</h1>

	{{-- MEDIA GALLERY --}}
	@if($data->object->hasGallery())
		@include('content._partials.object_gallery')
	@endif

</div>



