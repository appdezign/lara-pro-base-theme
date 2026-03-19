<div class="flex justify-end mt-6 mb-8">
	@if($data->entityListUrl)
		<a href="{{ $data->entityListUrl }}"
		   class="btn btn-square btn-outline btn-primary ms-4">
			<x-heroicon-o-chevron-left class="w-5 h-5"/>
		</a>
	@endif
</div>

<div class="card shadow-sm overflow-hidden mb-12">
	<div class="grid grid-cols-12 g-0">
		@if($data->object->hasFeatured())
			<div class="col-span-12 md:col-span-5 bg-center bg-no-repeat bg-cover"
			     style="background-image: url({!! glideUrl($data->object->featured()->path, 960, 960) !!}); min-height: 20rem;">
			</div>
		@else
			<div class="col-span-12 md:col-span-5 bg-center bg-no-repeat bg-cover"
			     style="background-image: url('https://dummyimage.com/960x960/e8ecf0/d4d8dc?text=Lara+CMS'); min-height: 20rem;">

			</div>
		@endif

		<div class="col-span-12 md:col-span-7">
			<div class="card-body">

				<h1 class="mb-3">{{ $data->object->first_name.' '.$data->object->middle_name.' '.$data->object->title }}</h1>
				<div class="py-3">
					<strong>{!! $data->object->role !!}</strong>
				</div>
				<div class="py-3">
					<div class="rich-content-body">
						{!! $data->object->body !!}
					</div>
				</div>

				<div class="py-3">

					@if(isset($data->object->facebook) && $data->object->facebook)
						<a class="btn btn-square btn-soft btn-primary me-3"
						   href="https://www.facebook.com/{{ $data->object->facebook }}"
						   target="_blank">
							@include('_icons.facebook', ['iconclasses' => 'w-6 h-6'])
						</a>
					@endif

					@if(isset($data->object->twitter) && $data->object->twitter)
						<a class="btn btn-square btn-soft btn-primary me-3"
						   href="https://twitter.com/{{ $data->object->twitter }}"
						   target="_blank">
							@include('_icons.twitter', ['iconclasses' => 'w-6 h-6'])
						</a>
					@endif

					@if(isset($data->object->linkedin) && $data->object->linkedin)
						<a class="btn btn-square btn-soft btn-primary me-3"
						   href="https://www.linkedin.com/in/{{ $data->object->linkedin }}"
						   target="_blank">
							@include('_icons.linkedin', ['iconclasses' => 'w-6 h-6'])
						</a>
					@endif

					@if(isset($data->object->email) && $data->object->email)
						<a class="btn btn-square btn-soft btn-primary me-3"
						   href="mailto:{{ $data->object->email }}"
						   target="_blank">
							@include('_icons.email', ['iconclasses' => 'w-6 h-6'])
						</a>
					@endif
				</div>

			</div>
		</div>
	</div>
</div>

@if($data->object->hasVideos())
	<h3>{{ $data->object->video->title }}</h3>
	<div class="aspect-video my-12">
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

{{-- MEDIA GALLERY --}}
@if($data->object->hasGallery())
	@include('content._partials.object_gallery')
@endif
