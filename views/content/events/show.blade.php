@extends('layout')

@section('content')

	@include('content.'.$entity->getResourceSlug().'.show.single')

@endsection

@section('scripts-after')

	@if(is_numeric($data->object->location->geo_latitude) && is_numeric($data->object->location->geo_longitude))
		@if($data->object->location->geo_latitude != 0 && $data->object->location->geo_longitude != 0)
			<script>

				function initMap() {
					var myLatLng = {lat: {{ $data->object->location->geo_latitude }}, lng: {{ $data->object->location->geo_longitude }}};

					var map = new google.maps.Map(document.getElementById('map-canvas'), {
						zoom: 13,
						center: myLatLng
					});

					var marker = new google.maps.Marker({
						position: myLatLng,
						map: map,
						title: '{{ $data->object->location->title }}'
					});
				}

			</script>
			<script async defer
			        src="https://maps.googleapis.com/maps/api/js?key={{ config('lara.google_maps_api_key') }}&callback=initMap">
			</script>
		@endif
	@endif

@endsection