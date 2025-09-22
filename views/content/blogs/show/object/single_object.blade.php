<div class="mt-24 pt-lg-8 pb-16">
	<a href="{{ $data->entityListUrl }}"
	   class="btn btn-outline-primary ms-16 px-14 py-10 float-end">
		<i class="far fa-lg fa-angle-left"></i>
	</a>

	<h1 class="pb-16">{{ $data->object->title }}</h1>

	<div class="d-flex flex-md-row flex-column align-items-md-center justify-content-md-between mb-16">
		<div class="d-flex align-items-center flex-wrap text-muted mb-md-0 mb-24">
			<div class="fs-14 border-end pe-16 me-16 mb-8">
				{{ Date::parse($data->object->publish_from)->format('j F Y') }}
			</div>
			<div class="fs-14 pe-16 me-16 mb-8">
				@foreach($data->object->tags->where('taxonomy_id', 2) as $tag)
					<span class="badge bg-faded-primary text-primary">{{ $tag->title }}</span>
				@endforeach
			</div>
		</div>
	</div>
</div>

{{-- FEATURED VIDEO --}}
@if($data->object->hasVideofiles())
	<div class="ratio ratio-16x9 mt-48 mb-48">
		<video controls>
			@if($data->object->publish == 1)
				<source src="{{ $entity->getUrlForVideos().'/' . $data->object->videofile->filename }}"
				        type="video/mp4">
			@else
				<source src="{{ $entity->getUrlForVideos().'/_archive/' . $data->object->videofile->filename }}"
				        type="video/mp4">
			@endif
		</video>
	</div>
@elseif($data->object->hasVideos())
	<div class="ratio ratio-16x9 mt-48 mb-48">
		<iframe width="560" height="315"
		        src="https://www.youtube.com/embed/{{ $data->object->video->youtubecode }}?rel=0"
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
{!! $data->object->renderRichContent('body') !!}

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
