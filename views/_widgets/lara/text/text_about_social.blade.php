<section class="container text-center py-12 my-2 md:my-6 lg:my-12">

	<h2 class="h1 mb-6">We Have Social Networks</h2>

	<p class="text-lg text-gray-500 pb-2 mb-12">Follow us and keep up to date with the freshest news!</p>
	<div class="swiper-aos" data-aos="fade-up">
		<div class="js-swiper swiper" data-swiper-options='{
          "slidesPerView": 2,
          "speed": 800,
          "autoplay": {
            "delay": 5000,
            "disableOnInteraction": false
          },
          "pagination": {
            "el": ".swiper-pagination",
            "clickable": true
          },
          "breakpoints": {
            "500": {
              "slidesPerView": 3
            },
            "650": {
              "slidesPerView": 4
            },
            "900": {
              "slidesPerView": 5
            }
          }
        }'>
			<div class="swiper-wrapper">

				<!-- Item -->
				<div class="swiper-slide">
					<div class="relative text-center">
						<a href="#" class="btn btn-secondary hover:text-white hover:bg-primary btn-lg border-none">
							@include('_icons.facebook', ['iconclasses' => 'w-4 h-4'])
						</a>
						<div class="pt-6">
							<h4 class="h6 mb-1">Facebook</h4>
							<p class="text-sm text-gray-500 mb-0">laracms</p>
						</div>
					</div>
				</div>

				<!-- Item -->
				<div class="swiper-slide">
					<div class="relative text-center">
						<a href="#" class="btn btn-secondary hover:text-white hover:bg-primary btn-lg border-none">
							@include('_icons.instagram', ['iconclasses' => 'w-4 h-4'])
						</a>
						<div class="pt-6">
							<h4 class="h6 mb-1">Instagram</h4>
							<p class="text-sm text-gray-500 mb-0">@laracms</p>
						</div>
					</div>
				</div>

				<!-- Item -->
				<div class="swiper-slide">
					<div class="relative text-center">
						<a href="#" class="btn btn-secondary hover:text-white hover:bg-primary btn-lg border-none">
							@include('_icons.twitter', ['iconclasses' => 'w-4 h-4'])
						</a>
						<div class="pt-6">
							<h4 class="h6 mb-1">Twitter</h4>
							<p class="text-sm text-gray-500 mb-0">@laracms</p>
						</div>
					</div>
				</div>

				<!-- Item -->
				<div class="swiper-slide">
					<div class="relative text-center">
						<a href="#" class="btn btn-secondary hover:text-white hover:bg-primary btn-lg border-none">
							@include('_icons.linkedin', ['iconclasses' => 'w-4 h-4'])
						</a>
						<div class="pt-6">
							<h4 class="h6 mb-1">LinkedIn</h4>
							<p class="text-sm text-gray-500 mb-0">LaraCms Inc.</p>
						</div>
					</div>
				</div>

				<!-- Item -->
				<div class="swiper-slide">
					<div class="relative text-center">
						<a href="#" class="btn btn-secondary hover:text-white hover:bg-primary btn-lg border-none">
							@include('_icons.youtube', ['iconclasses' => 'w-4 h-4'])
						</a>
						<div class="pt-6">
							<h4 class="h6 mb-1">YouTube</h4>
							<p class="text-sm text-gray-500 mb-0">LaraCms</p>
						</div>
					</div>
				</div>

			</div>

			<!-- Pagination (bullets) -->
			<div class="swiper-pagination !relative bottom-0 pt-4 mt-6"></div>
		</div>
	</div>
</section>