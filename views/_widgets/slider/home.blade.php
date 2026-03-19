<?php $heros = json_decode(json_encode(config('data.heros')), false); ?>

<div class="js-swiper swiper swiper-nav-onhover"
     data-swiper-options='{
				"effect": "fade",
				"loop": true,
				"speed": 800,
				"autoplay": {
					"delay": 6000,
					"disableOnInteraction": false
				},
				"pagination": {
					"el": ".swiper-pagination",
					"clickable": true
				},
				"navigation": {
					"prevEl": ".swiper-button-prev",
					"nextEl": ".swiper-button-next"
				}
			}'>
	<div class="swiper-wrapper lara-hero lara-hero-height" data-theme="dark">

		@foreach($heros as $hero)
			<!-- Hero Item start -->
			<div class="swiper-slide h-full"
			     style="background-image: url('{{ $hero->image }}');">

				<div class="hero h-full">
					<div class="hero-overlay"></div>
					<div class="hero-content text-center">
						<div class="max-w-3xl">
							<h2 class="heading mb-5 text-3xl md:text-4xl/12 lg:text-5xl/20 xl:text-6xl/20  font-bold from-start">
								{{ $hero->title }}
							</h2>

							<div class="mb-12 px-16 lg:px-24 from-end">
								<p>
									{{ $hero->payoff }}
								</p>
							</div>

							<div class="scale-up delay-1s">
								<button class="btn btn-lg btn-primary">{{ $hero->cta }}</button>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- Hero Item end -->
		@endforeach



		<div class="swiper-button-prev rounded-full bg-white/10 hover:bg-primary"></div>
		<div class="swiper-button-next rounded-full bg-white/10 hover:bg-primary"></div>

		<div class="swiper-pagination"></div>

	</div>
</div>