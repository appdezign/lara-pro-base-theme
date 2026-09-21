@if($larawidget)

	<h3 class="mb-8 text-xl font-bold">{{ $larawidget->title }}</h3>

	<div class="opacity-80">

		{!! $larawidget->body !!}

		<p>{{ $globalsettings->company_name }}</p>
		<p>
			{{ $globalsettings->company_street }} {{ $globalsettings->company_street_nr }}<br>
			{{ $globalsettings->company_pcode }} {{ $globalsettings->company_city }}<br>
			{{ $globalsettings->company_country }}
		</p>
		<p>
			Tel: <a href="tel:{{ $globalsettings->company_telephone_clean }}">{{ $globalsettings->company_telephone }}</a><br>
			E-mail: <a href="mailto:{{ $globalsettings->company_email }}">{{ $globalsettings->company_email }}</a>
		</p>

	</div>
@endif