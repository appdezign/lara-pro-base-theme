<div class="mt-24 pt-lg-8 pb-16">

	<a href="{{ $data->entityListUrl }}"
	   class="btn btn-outline-primary ms-16 px-14 py-10 float-end">
		<i class="far fa-lg fa-angle-left"></i>
	</a>

	<h1 class="pb-16">{{ $data->object->title }}</h1>

	<div class="d-flex flex-md-row flex-column align-items-md-center justify-content-md-between mb-16">
		<div class="d-flex align-items-center flex-wrap text-muted mb-md-0 mb-24">
			<div class="fs-14 border-end pe-16 me-16 mb-8">
				{{ Date::parse($data->object->startdate)->format('j F Y') }}
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
{!! $data->object->lead !!}

<table class="table">
	<thead>
		<tr>
			<th class="d-none d-md-table-cell" style="width:20%">&nbsp;</th>
			<th style="width:20%">&nbsp;</th>
			<th style="width:60%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>

		<tr class="d-table-row d-md-none">
			<td class="d-none d-md-table-cell bg-secondary">&nbsp;</td>
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

		<tr class="d-none d-md-table-row">
			<td class="bg-secondary">
				<div class="event-date-container">
					<div class="event-date-month">
						{{ Carbon\Carbon::parse( $data->object->startdate)->format('M') }}
					</div>
					<div class="event-date-day">
						{{ Carbon\Carbon::parse( $data->object->startdate)->format('d') }}
					</div>
				</div>
			</td>
			<td colspan="2" class="bg-secondary pt-24">
				{!! $data->object->title !!}
			</td>
		</tr>

		@if($data->object->enddate == $data->object->startdate)

			<tr>
				<td class="d-none d-md-table-cell event-table-white">&nbsp;</td>
				<td class="event-table-white">Datum</td>
				<td class="event-table-white">
					{{ Date::parse($data->object->startdate)->format('j F Y') }}
				</td>
			</tr>
			@if($data->object->starttime != '00:00:00')
				<tr>
					<td class="d-none d-md-table-cell event-table-white">&nbsp;</td>
					<td class="event-table-white">Tijd</td>
					<td class="event-table-white">

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
				<td class="d-none d-md-table-cell event-table-white">&nbsp;</td>
				<td class="event-table-white">Startdatum</td>
				<td class="event-table-white">
					{{ Date::parse($data->object->startdate)->format('j F Y') }}
					@if($data->object->starttime != '00:00:00')
						&nbsp;-&nbsp;
						{{ Carbon\Carbon::parse( $data->object->starttime)->format('H:i') }}
						&nbsp;uur
					@endif
				</td>
			</tr>
			<tr>
				<td class="d-none d-md-table-cell event-table-white">&nbsp;</td>
				<td class="event-table-white">Enddatum</td>
				<td class="event-table-white">
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
				<td class="d-none d-md-table-cell event-table-white">&nbsp;</td>
				<td class="event-table-white">Locatie:</td>
				<td class="event-table-white">
					<p><strong>{{ $data->object->location->title }}</strong></p>
					<p>{{ $data->object->location->address }}<br>
						{{ $data->object->location->pcode }} {{ $data->object->location->city }}<br>
						{{ $data->object->location->country }}</p>
				</td>
			</tr>
		@endif

		@if($data->object->body)
			<tr>
				<td class="d-none d-md-table-cell event-table-white">&nbsp;</td>
				<td colspan="2" class="event-table-white">
					{!! $data->object->body !!}
				</td>
			</tr>
		@endif

		<tr>
			<td class="d-none d-md-table-cell bg-secondary">&nbsp;</td>
			<td colspan="2" class="bg-secondary">&nbsp;</td>
		</tr>
	</tbody>

</table>



@if(is_numeric($data->object->location->latitude) && is_numeric($data->object->location->longitude))
	@if($data->object->location->latitude != 0 && $data->object->location->longitude != 0)

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
