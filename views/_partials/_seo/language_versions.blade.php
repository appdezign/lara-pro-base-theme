@foreach($data->langversions as $langver)
@if($langver->active == false && !empty($langver->route))
<link rel="alternate" href="{{ $langver->route }}" hreflang="{{ $langver->langcode }}" />
@endif
@endforeach

