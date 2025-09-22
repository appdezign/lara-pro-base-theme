@if($ytsize == 'maxresdefault')
	<div class="ratio ratio-16x9">
		<img data-src="https://img.youtube.com/vi/{{ $ytcode }}/{{ $ytsize }}.jpg"
		     width="{{ $ytw }}" height="{{ $yth }}" class="lazyload"/>
	</div>
@else
	<div class="ratio ratio-16x9">
		<img data-src="https://img.youtube.com/vi/{{ $ytcode }}/{{ $ytsize }}.jpg"
		     width="{{ $ytw }}" height="{{ $yth }}" class="lazyload"/>
	</div>
@endif