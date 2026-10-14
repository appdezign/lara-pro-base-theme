<?php
$lang = LaravelLocalization::getCurrentLocale();
?>

<li>
	<a href="{{ url($lang . '/' . $node->route) }}">
		{{ $node->title }}
	</a>
</li>

