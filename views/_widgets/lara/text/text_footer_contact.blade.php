@if($larawidget)

	<h3 class="mb-8 text-xl font-bold">{{ $larawidget->title }}</h3>

	<div class="opacity-80">

		{!! $larawidget->body !!}

		<p>{{ $settngz->company_name }}</p>
		<p>
			{{ $settngz->company_street }} {{ $settngz->company_street_nr }}<br>
			{{ $settngz->company_pcode }} {{ $settngz->company_city }}<br>
			{{ $settngz->company_country }}
		</p>
		<p>
			Tel: <a href="tel:{{ $settngz->company_telephone_clean }}">{{ $settngz->company_telephone }}</a><br>
			E-mail: <a href="mailto:{{ $settngz->company_email }}">{{ $settngz->company_email }}</a>
		</p>

	</div>
@endif