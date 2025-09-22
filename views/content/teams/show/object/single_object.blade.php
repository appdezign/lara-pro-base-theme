<div class="mb-36 text-end">
	<a href="{{ $data->entityListUrl }}"
	   class="btn btn-outline-primary py-12">
		<i class="far fa-lg fa-angle-left"></i>
	</a>
</div>

<div class="card border-0 shadow-sm overflow-hidden mb-48">
	<div class="row g-0">
		@if($data->object->hasFeatured())
			<div class="col-md-5 bg-position-center bg-repeat-0 bg-size-cover"
			     style="background-image: url({{ _cimg($data->object->getFeatured()->filename, 1280, 960) }}); min-height: 20rem;">
			</div>
		@else
			<div class="col-md-5 bg-position-center bg-repeat-0 bg-size-cover"
			     style="background-image: url('https://dummyimage.com/960x960/e8ecf0/d4d8dc?text=Lara+CMS'); min-height: 20rem;">

			</div>
		@endif

		<div class="col-md-7">
			<div class="card-body">

				<h1 class="mb-12">{{ $data->object->firstname.' '.$data->object->middlename.' '.$data->object->title }}</h1>
				<div class="py-12">
					<strong>{!! $data->object->role !!}</strong>
				</div>
				<div class="py-12">
					{!! $data->object->body !!}
				</div>

				<div class="py-12">

					@if(isset($data->object->facebook) && $data->object->facebook)
						<a class="d-inline-block me-12"
						   href="https://www.facebook.com/{{ $data->object->facebook }}"
						   target="_blank">
							<i class="fab fa-facebook-square fs-36"></i>
						</a>
					@endif

					@if(isset($data->object->twitter) && $data->object->twitter)
						<a class="d-inline-block me-12"
						   href="https://twitter.com/{{ $data->object->twitter }}"
						   target="_blank">
							<i class="fab fa-twitter-square fs-36"></i>
						</a>
					@endif

					@if(isset($data->object->linkedin) && $data->object->linkedin)
						<a class="d-inline-block me-12"
						   href="https://www.linkedin.com/in/{{ $data->object->linkedin }}"
						   target="_blank">
							<i class="fab fa-linkedin fs-36"></i>
						</a>
					@endif
				</div>

			</div>
		</div>
	</div>
</div>

@if($data->object->hasVideos())
	<h3>{{ $data->object->video->title }}</h3>
	<div class="ratio ratio-16x9 mt-48 mb-48">
		<iframe width="560" height="315"
		        src="https://www.youtube.com/embed/{{ $data->object->video->youtubecode }}?rel=0"
		        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	</div>
@endif

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


