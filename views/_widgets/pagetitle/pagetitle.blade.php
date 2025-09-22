@if($widgetpagetitle)

	<?php $pTitle = ($menulevelone) ? $menulevelone->title : '&nbsp;'; ?>

	<div class="jarallax d-none d-md-block" data-jarallax data-speed="0.35">
		<span class="position-absolute top-0 start-0 w-100 h-100 bg-black-alfa-40"></span>
		<div class="jarallax-img"
		     style="background-image: url({{ _cimg($widgetpagetitle->getFeatured()->filename, 1920, 960) }});"></div>
		<div class="position-relative d-flex justify-content-center align-items-center zindex-5 overflow-hidden"
		     style="height: 130px;">

			<h2 class="fs-36 fw-normal text-white" style="opacity: 0.75">{{ $pTitle }}</h2>

		</div>
	</div>

@endif
