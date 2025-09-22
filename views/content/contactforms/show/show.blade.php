<?php if ($data->gridvars) require($data->gridvars); ?>
<?php if ($data->override) require($data->override); ?>

<section class="position-relative bg-secondary mt-36 pt-48">
	<div class="container position-relative zindex-2 ">

		<div class="row">

			<!-- Contact links -->
			<div class="col-xl-4 col-lg-5 pb-24 pb-sm-48 mb-8 mb-sm-0">
				<div class="pe-lg-24 pe-xl-0">
					<h1 class="pb-16 pb-md-24 mb-lg-48">{{ $data->page->title }}</h1>
					{!! $data->page->body !!}
				</div>
			</div>

			<!-- Contact form -->
			<div class="col-xl-6 col-lg-7 offset-xl-2">
				<div class="card border-light shadow-lg py-16 p-sm-24 p-md-36">
					<div class="bg-dark position-absolute top-0 start-0 w-100 h-100 rounded-3 d-none d-dark-mode-block"></div>
					<div class="card-body position-relative zindex-2">
						<h2 class="card-title mb-16">Get in touch</h2>
						@include('content.' . $entity->getResourceSlug() . '.show.form.form')
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="position-absolute bottom-0 start-0 w-100 bg-light" style="height: 4rem;"></div>
</section>

<section>
	<div class="row mx-0 mt-72 mb-0">
		<div class="col px-0">
			<div class="maps-container">
				<div id="map-canvas" style="width:100%; height:500px; border:solid 1px #ccc"></div>
			</div>
		</div>
	</div>
</section>

@section('scripts-after')

	@parent

	@if($settngz->company_latitude && $settngz->company_longitude)

		<script>

			function initMap() {

				// new test

				var myLat = {{ $settngz->company_latitude }};
				var myLong = {{ $settngz->company_longitude }};
				var myZoom = {{ $settngz->google_maps_zoom }};

				var myLocation = {lat: myLat, lng: myLong};
				var map = new google.maps.Map(document.getElementById('map-canvas'), {
					zoom: myZoom,
					center: myLocation
				});

				var myInfo = '<div class="gmapInfoContent">' +
					'<h5>{{ $settngz->company_name }}</h5>' +
					'<p>{{ $settngz->company_street }} {{ $settngz->company_street_nr }}<br>' +
					'{{ $settngz->company_pcode }} {{ $settngz->company_city }}<br>' +
					'<a href="{{ $settngz->company_url }}">{{ $settngz->company_url }}</a></p>' +
					'</div>';

				var infowindow = new google.maps.InfoWindow({
					content: myInfo
				});

				var marker = new google.maps.Marker({
					position: myLocation,
					map: map,
					title: '{{ $settngz->company_name }}'
				});
				marker.addListener('click', function () {
					infowindow.open(map, marker);
				});
			}
		</script>

		<script async defer
		        src="https://maps.googleapis.com/maps/api/js?key={{ config('lara.google_maps_api_key') }}&callback=initMap">
		</script>

	@endif


@endsection