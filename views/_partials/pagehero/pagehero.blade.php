{{-- PAGE HERO IMAGE --}}

@if(!$data->layout->hero && $data->page && $data->page->hasHero())

	<div class="jarallax d-none d-md-block" data-jarallax data-speed="0.35">
		<span class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-primary-translucent"></span>
		<div class="jarallax-img"
		     style="background-image: url({{ _cimg($data->page->getHero()->filename, 1920, 960) }});"></div>
		<div class="position-relative text-center zindex-5 overflow-hidden page-hero-{{ $data->page->getHero()->hero_size }}">
			@if($data->page->getHero()->caption)
				<h3 class="h3 text-white">{{ strip_tags($data->page->getHero()->caption) }}</h3>
			@else
				&nbsp;
			@endif
		</div>
	</div>

@endif