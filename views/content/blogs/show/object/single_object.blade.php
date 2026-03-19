<div class="flex mt-6">
	<h1 class="h1 grow-1">{{ $data->object->title }}</h1>
	@if($data->entityListUrl)
		<a href="{{ $data->entityListUrl }}"
		   class="btn btn-square btn-outline btn-primary ms-4">
			<x-heroicon-o-chevron-left class="w-5 h-5"/>
		</a>
	@endif
</div>

<div class="flex items-center mb-4">
		<span class="text-sm text-gray-600 pe-4 me-4 border-e-1 border-gray-400">
			{{ Date::parse($data->object->publish_from)->format('j F Y') }}
		</span>
	@foreach($data->object->tags->where('taxonomy_id', 2) as $tag)
		<a href="#" class="px-2 py-1 text-sm text-primary bg-secondary no-underline">{{ $tag->title }}</a>
	@endforeach
</div>

{{-- FEATURED VIDEO --}}
@if($data->object->hasVideofiles())
	@foreach($data->object->getVideofiles() as $videofile)
		<div class="aspect-video my-12">
			<video controls>
				<source src="{{ $entity->getVideoUrl($videofile->vidfile_filename) }}" type="video/mp4">
			</video>
		</div>
	@endforeach
@elseif($data->object->hasVideos())
	<div class="aspect-video my-12">
		<iframe width="560" height="315"
		        src="https://www.youtube.com/embed/{{ $data->object->getVideo()->youtubecode }}?rel=0"
		        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	</div>
@endif

{{-- FEATURED IMAGE --}}
@if($data->object->hasFeatured())
	<figure class="my-12">
		@include('_img.glide', ['media' => $data->object->featured(), 'width' => 1280, 'height' => 720, 'ratio' => '16/9', 'class' => 'object-cover' ])
	</figure>
@endif

{{-- BODY TEXT --}}
<div class="rich-content-body">
	{!! $data->object->body !!}
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
