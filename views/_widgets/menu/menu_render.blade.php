<?php
$lang = LaravelLocalization::getCurrentLocale();
$navlink = ($node->type->value == 'url') ? $node->url : url($lang . '/' . $node->route);
?>

@if(!$node->isLeaf() && sizeof($node->children) > 0)
	<!-- dropdown -->
	<li>
		<div class="dropdown dropdown-hover">
			<a tabindex="0" class="menu-dropdown-toggle">
				{{ $node->title }}
				<x-heroicon-m-chevron-down class="h-4 w-4"/>
			</a>

			<ul tabindex="-1" class="menu dropdown-content ">
				@foreach ($node->children as $node)
					@include('_widgets.menu.menu_render', $node)
				@endforeach
			</ul>
		</div>
	</li>
@else
	@if($node->depth > 0)
		<!-- single sub -->
		<li>
			<a href="{{ $navlink }}" class="menu-sub-link">
				{{ $node->title }}
			</a>
		</li>
	@else
		<!-- single root -->
		<li>
			<a href="{{ $navlink }}" class="menu-link">
				{{ $node->title }}
			</a>
		</li>
	@endif
@endif


