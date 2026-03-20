@if($widgetpagetitle)

	<?php $pTitle = ($menulevelone) ? $menulevelone->title : '&nbsp;'; ?>

	<div class="jarallax hidden md:block" data-jarallax data-speed="0.35">
		<span class="absolute top-0 start-0 w-full h-full bg-primary opacity-40"></span>
		<div class="jarallax-img"
		     style="background-image: url({!! glideUrl($widgetpagetitle->featured()->path, 1920, 960) !!});"></div>
		<div class="relative flex justify-center items-center z-5 overflow-hidden"
		     style="height: 130px;">

			<h2 class="text-4xl mb-0 font-semibold tracking-widest text-white opacity-90">
				{{ $pTitle }}
			</h2>

		</div>
	</div>

@endif
