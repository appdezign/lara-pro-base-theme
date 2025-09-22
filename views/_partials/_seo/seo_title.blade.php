<?php
$laracomposer = file_get_contents(base_path('/laracms/core/composer.json'));
$laracomposer = json_decode($laracomposer,true);
?>

@if(isset($data->activetag) && $data->activetag->seo_title)
	<title>{{ $data->activetag->seo_title }}</title>
@else
	<title>{{ $data->seo->seo_title }}</title>
@endif

<!-- Powered by Lara CMS version [{{ $laracomposer['version'] }}] -->
