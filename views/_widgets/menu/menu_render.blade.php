<?php
$lang = LaravelLocalization::getCurrentLocale();
$navlink = ($node->type == 'url') ? $node->url : url($lang . '/' . $node->route);
?>

@if(!$node->isLeaf() && sizeof($node->children) > 0)
	<li class="nav-item dropdown" id="menu-item-{{ $node->id }}">
		@if(empty($node->route))
			{{-- folder --}}
			<a href="#"
			   class="nav-link dropdown-toggle @if(in_array($node->id, $activemenu)) active @endif"
			   data-bs-toggle="dropdown">
				{{ $node->title }}
			</a>
		@else
			{{-- clickable folder --}}
			<a href="{{ $navlink }}"
			   class="nav-link dropdown-toggle @if(in_array($node->id, $activemenu)) active @endif"
			   data-bs-toggle="dropdown">
				{{ $node->title }}
			</a>
		@endif

		<ul class="dropdown-menu" id="menu-item-{{ $node->id }}-submenu">
			@foreach ($node->children as $node)
				@include('_widgets.menu.menu_render', $node)
			@endforeach
		</ul>
	</li>
@else
	@if($node->depth > 1)
		<li id="menu-item-{{ $node->id }}">
			<a href="{{ $navlink }}"
			   class="dropdown-item @if(in_array($node->id, $activemenu)) active @endif">
				{{ $node->title }}
			</a>
		</li>
	@else
		<li class="nav-item" id="menu-item-{{ $node->id }}">
			<a href="{{ $navlink }}"
			   class="nav-link @if(in_array($node->id, $activemenu)) active @endif">
				{{ $node->title }}
			</a>
		</li>
	@endif
@endif


