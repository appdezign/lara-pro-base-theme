<?php
$lang = LaravelLocalization::getCurrentLocale();
$navlink = ($node->type->value == 'url') ? $node->url : url($lang . '/' . $node->route);
?>

@if(!$node->isLeaf() && sizeof($node->children) > 0)
	<!-- dropdown -->
	<li>
		<a href="#"
		   class="mobile-menu-dropdown-toggle">
			{{ $node->title }}
			<x-heroicon-m-chevron-down class="sh-4 w-4"/>
		</a>

		<ul class="mobile-menu-dropdown-content hidden">
			@foreach ($node->children as $node)
				@include('_widgets.menu_mobile.menu_render', $node)
			@endforeach
		</ul>
	</li>
@else
	@if($node->depth > 0)
		<!-- single sub -->
		<li>
			<a href="{{ $navlink }}" class="mobile-menu-sub-link">
				{{ $node->title }}
			</a>
		</li>
	@else
		<!-- single root -->
		<li>
			<a href="{{ $navlink }}" class="mobile-menu-link">
				{{ $node->title }}
			</a>
		</li>
	@endif
@endif


