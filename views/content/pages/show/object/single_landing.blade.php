<h1 class="h1">{{ $data->object->title }}</h1>

@if($data->object->hasVideos())

	<div class="relative rounded overflow-hidden mt-4 mb-12">
		<div class="absolute top-0 start-0 w-full h-full flex items-center justify-center z-5">

			<a data-src="//www.youtube.com/watch?v={{ $data->object->getVideo()->youtubecode }}" class="btn btn-circle w-16 h-16 bg-white hover:bg-primary text-dark-gray-900 hover:text-white border-none" data-bs-toggle="video">
				<x-heroicon-s-play class="w-6 h-6"/>
			</a>

		</div>
		<span class="absolute top-0 start-0 w-full h-full bg-black opacity-35"></span>

		@if($data->object->hasFeatured())
			@include('_img.glide', ['media' => $data->object->featured(), 'width' => 1280, 'height' => 512, 'ratio' => '5/2'])
		@else
			<img src="https://img.youtube.com/vi/{{ $data->object->getVideo()->youtubecode }}/maxresdefault.jpg"/>
		@endif

	</div>

@else

	@if($data->object->hasVideofiles())
		<div class="aspect-16/9 my-12">
			<video controls>
				<source src="{{ $entity->getVideoUrl($data->object->videofile->filename) }}" type="video/mp4">
			</video>
		</div>
	@endif

	@if($data->object->hasFeatured())
		<figure class="mb-12">
			@include('_img.glide', ['media' => $data->object->featured(), 'width' => 1280, 'height' => 512, 'ratio' => '5/2'])
		</figure>
	@endif

@endif

{{-- BODY TEXT --}}
{!!$data->object->body !!}

{{-- RELATED --}}
@include('content._partials.object_related')

{{-- FILES --}}
@include('content._partials.object_files')

{{-- GALLERY --}}
@include('content._partials.object_gallery')
