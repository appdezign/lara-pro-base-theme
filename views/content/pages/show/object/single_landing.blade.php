<h1 class="lara-object-title">{{ $data->object->title }}</h1>

@if($data->object->hasVideos() && $data->object->hasFeatured())

	<div class="position-relative rounded-3 overflow-hidden mt-16 mb-48">
		<div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center zindex-5">
			<a href="https://www.youtube.com/watch?v={{ $data->object->getVideo()->youtubecode }}"
			   class="btn btn-video btn-icon btn-xl stretched-link bg-white" data-bs-toggle="video">
				<i class="fas fa-play fs-14"></i>
			</a>
		</div>
		<span class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-35"></span>
		@include('_img.lazy', ['lzobj' => $data->object->getFeatured(), 'lzw' => 1280, 'lzh' => 512, 'ar' => '5x2', 'cl' => 'd-block w-100'])
	</div>

@else

	@if($data->object->hasVideos())

		<div class="position-relative rounded-3 overflow-hidden mt-16 mb-48">
			<div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center zindex-5">
				<a href="https://www.youtube.com/watch?v={{ $data->object->getVideo()->youtubecode }}"
				   class="btn btn-video btn-icon btn-xl stretched-link bg-white" data-bs-toggle="video">
					<i class="fas fa-play fs-14"></i>
				</a>
			</div>
			<span class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-35"></span>
		</div>
	@endif

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
	@endif

	@if($data->object->hasFeatured())
		<figure class="mb-48">
			@include('_img.lazy', ['lzobj' => $data->object->getFeatured(), 'lzw' => 1280, 'lzh' => 640, 'ar' => '2x1', 'fc' => false])
		</figure>
	@endif

@endif

@include('larawidget', ['hook' => 'bodytext_top'])

{{-- BODY TEXT --}}
{!! $data->object->body !!}

@include('larawidget', ['hook' => 'bodytext_bottom'])

{{-- RELATED --}}
@if($entity->hasRelated())
	@include('content._partials.object_related')
@endif

{{-- FILES --}}
@if($data->object->hasFiles())
	@include('content._partials.object_files')
@endif

{{-- GALLERY --}}
@if($data->object->hasGallery())
	@include('content._partials.object_gallery')
@endif
