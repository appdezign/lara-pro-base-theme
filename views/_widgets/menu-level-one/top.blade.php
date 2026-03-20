<?php $lang = LaravelLocalization::getCurrentLocale(); ?>

<ul class="menu menu-horizontal">
	@foreach($menulevelone as $item)
		@if($item->publish == 1)
			<?php $navlink = ($item->type == 'url') ? $item->url : url($lang . '/' . $item->route); ?>
			<li>
				<a href="{{ $navlink }}"
				   class="menu-link hover:bg-transparent hover:text-primary">
					{{ $item->title }}
				</a>
			</li>
		@endif
	@endforeach
</ul>

