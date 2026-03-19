<h2 class="mb-12 text-center">Сustom Software Solutions</h2>

<div class="swiper-aos" data-aos="fade-up">
	<div class="js-swiper swiper !pb-8" data-swiper-options='{
			          "spaceBetween": 24,
			          "speed": 800,
			          "autoplay": {
			            "delay": 5000,
			            "disableOnInteraction": false
					  },
			          "breakpoints": {
			            "0": {
			              "slidesPerView": 1
			            },
			            "640": {
			              "slidesPerView": 2
			            },
			            "992": {
			              "slidesPerView": 3
			            },
			            "1200": {
			              "slidesPerView": 4
			            }
			          },
			          "pagination": {
			            "el": ".swiper-pagination",
			            "clickable": true
			          }
			        }'>
		<div class="swiper-wrapper">

			@include('larawidget', ['hook' => 'home1'])
			@include('larawidget', ['hook' => 'home2'])
			@include('larawidget', ['hook' => 'home3'])
			@include('larawidget', ['hook' => 'home4'])

		</div>
		<div class="swiper-pagination position-static mt-24 pt-lg-16 pt-8"></div>
	</div>
</div>

