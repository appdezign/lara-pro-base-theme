@if($larawidget)

	<h2 class="mb-8 text-xl font-bold">{{ $larawidget->title }}</h2>

	<div class="opacity-80">
		{!! $larawidget->body !!}
	</div>

@endif
