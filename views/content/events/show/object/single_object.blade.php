<div class="flex mt-6">
	<h1 class="h1 grow-1">{{ $data->object->title }}</h1>
	@if($data->entityListUrl)
		<a href="{{ $data->entityListUrl }}"
		   class="btn btn-square btn-outline btn-primary ms-4">
			<x-heroicon-o-chevron-left class="w-5 h-5"/>
		</a>
	@endif
</div>

<p class="text-lg">{{ Date::parse($data->object->startdate)->format('j F Y') }}</p>

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
{!! $data->object->lead !!}

<table class="table mb-12">
	<thead>
		<tr>
			<th class="hidden lg:table-cell" style="width:20%">&nbsp;</th>
			<th style="width:20%">&nbsp;</th>
			<th style="width:60%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>

		<tr class="table-row lg:hidden">
			<td class="hidden lg:table-cell bg-secondary">&nbsp;</td>
			<td class="bg-secondary">
				<div class="event-date-container ms-0">
					<div class="event-date-month">
						{{ Carbon\Carbon::parse( $data->object->startdate)->format('M') }}
					</div>
					<div class="event-date-day">
						{{ Carbon\Carbon::parse( $data->object->startdate)->format('d') }}
					</div>
				</div>
			</td>
			<td class="bg-secondary">
				{!! $data->object->title !!}
			</td>
		</tr>

		<tr class="hidden lg:table-row">
			<td class="hidden lg:table-cell bg-secondary">
				<div class="event-date-container">
					<div class="event-date-month">
						{{ Carbon\Carbon::parse( $data->object->startdate)->format('M') }}
					</div>
					<div class="event-date-day">
						{{ Carbon\Carbon::parse( $data->object->startdate)->format('d') }}
					</div>
				</div>
			</td>
			<td colspan="2" class="bg-secondary">
				{!! $data->object->title !!}
			</td>
		</tr>

		@if($data->object->enddate == $data->object->startdate)

			<tr>
				<td class="hidden lg:table-cell">&nbsp;</td>
				<td class="">Datum</td>
				<td class="">
					{{ Date::parse($data->object->startdate)->format('j F Y') }}
				</td>
			</tr>
			@if($data->object->starttime != '00:00:00')
				<tr>
					<td class="hidden lg:table-cell">&nbsp;</td>
					<td class="">Tijd</td>
					<td class="">

						{{ Carbon\Carbon::parse( $data->object->starttime)->format('H:i') }}
						@if($data->object->endtime && $data->object->endtime != $data->object->starttime)
							&nbsp;-&nbsp;{{ Carbon\Carbon::parse( $data->object->endtime)->format('H:i') }}
						@endif
						&nbsp;uur

					</td>
				</tr>
			@endif
		@else

			<tr>
				<td class="hidden lg:table-cell align-top">&nbsp;</td>
				<td class="align-top">Startdatum</td>
				<td class="align-top">
					{{ Date::parse($data->object->startdate)->format('j F Y') }}
					@if($data->object->starttime != '00:00:00')
						&nbsp;-&nbsp;
						{{ Carbon\Carbon::parse( $data->object->starttime)->format('H:i') }}
						&nbsp;uur
					@endif
				</td>
			</tr>
			<tr>
				<td class="hidden lg:table-cell align-top">&nbsp;</td>
				<td class="align-top">Einddatum</td>
				<td class="align-top">
					{{ Date::parse($data->object->enddate)->format('j F Y') }}
					@if($data->object->endtime != '00:00:00')
						&nbsp;-&nbsp;
						{{ Carbon\Carbon::parse( $data->object->endtime)->format('H:i') }}
						&nbsp;uur
					@endif
				</td>
			</tr>

		@endif

		@if($data->object->location)
			<tr>
				<td class="hidden lg:table-cell ">&nbsp;</td>
				<td class="align-top">Locatie:</td>
				<td class="align-top">
					<p><strong>{{ $data->object->location->title }}</strong></p>
					<p>{{ $data->object->location->geo_address }}<br>
						{{ $data->object->location->geo_pcode }} {{ $data->object->location->geo_city }}<br>
						{{ $data->object->location->geo_country }}</p>
				</td>
			</tr>
		@endif

		@if($data->object->body)
			<tr>
				<td class="hidden lg:table-cell">&nbsp;</td>
				<td colspan="2" class="">
					<div class="rich-content-body">
						{!! $data->object->body !!}
					</div>
				</td>
			</tr>
		@endif

		<tr>
			<td class="hidden lg:table-cell bg-secondary">&nbsp;</td>
			<td colspan="2" class="bg-secondary">&nbsp;</td>
		</tr>
	</tbody>

</table>



@if(is_numeric($data->object->location->geo_latitude) && is_numeric($data->object->location->geo_longitude))
	@if($data->object->location->geo_latitude != 0 && $data->object->location->geo_longitude != 0)

		<h3>Kaart</h3>
		<div class="maps-container">
			<div id="map-canvas" class="bg-secondary" style="height: 500px;"></div>
		</div>

	@endif
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
