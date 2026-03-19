<?php if ($data->gridvars) require($data->gridvars); ?>
<?php if ($data->override) require($data->override); ?>

<section class="relative bg-secondary mt-8 pt-12">
	<div class="container relative z-2 ">

		<div class="grid grid-cols-12 gap-8">

			<!-- Contact links -->
			<div class="col-span-12 lg:col-span-5 xl:col-span-4 pb-6 sm:pb-12 mb-8 sm:mb-0">

				<div class="lg:pe-6 xl:pe-0">
					<h1 class="pb-4 md:pb-6 lg:mb-12">{{ $data->page->title }}</h1>

					@include('content.contactforms._partials.content')
				</div>
			</div>

			<!-- Contact form -->
			<div class="col-span-12 lg:col-span-7 xl:col-span-6 xl:col-start-7">

				<div class="card bg-white shadow-lg rounded-xl py-4 sm:p-6 md:p-8">
					<div class="card-body relative z-2 p-6">
						<h2 class="mb-4">Get in touch</h2>
						@include('content.' . $entity->getResourceSlug() . '.show.form.form')
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="absolute bottom-0 start-0 w-full bg-white" style="height: 4rem;"></div>
</section>

<section>
	<div class="grid grid-cols-12 mx-0 mt-16 mb-0">
		<div class="col-span-12 px-0">
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