{{-- PAGE HERO IMAGE --}}

@if(!$data->layout->hero && $data->page && $data->page->hasHero())

	<div class="jarallax hidden md:block" data-jarallax data-speed="0.35">
		<span class="absolute top-0 start-0 w-full h-full bg-gradient-primary-translucent"></span>
		<div class="jarallax-img"
		     style="background-image: url({!! glideUrl($data->page->hero()->path, 1920, 960) !!});"></div>
		<div class="relative text-center z-5 overflow-hidden py-20">
			@if($data->page->hero()->caption)
				<h3 class="h3 text-white">{{ strip_tags($data->page->hero()->caption) }}</h3>
			@else
				&nbsp;
			@endif
		</div>
	</div>

@endif