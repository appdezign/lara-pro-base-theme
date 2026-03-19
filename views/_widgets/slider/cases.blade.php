@if($widgetsliders)

	<div class="relative lg:py-4 xl:py-8">

		<!-- Swiper tabs -->
		<div class="swiper-tabs !absolute top-0 left-0 w-full h-full">
			@foreach($widgetsliders as $widgetslider)
				<div id="image-{{ $widgetslider->id }}"
				     @class([
						'jarallax',
						'!absolute',
						'top-0',
						'left-0',
						'w-full',
						'h-full',
						'swiper-tab',
						'active' => $loop->iteration == 1,
					])
				     data-jarallax data-speed="0.4"
				>
					<span class="!absolute top-0 left-0 w-full h-full bg-black opacity-35"></span>
					<div class="jarallax-img"
					     style="background-image: url('{!! glideUrl($widgetslider->featured()->path, 1920, 960) !!}');"></div>
				</div>
			@endforeach
		</div>

		<!-- Swiper slider -->
		<div class="container relative z-5 py-12">
			<div class="grid grid-cols-12 py-2 md:py-4">
				<div class="col-span-12 md:col-span-9 lg:col-span-7 xl:col-span-5">

					<!-- Slider controls (Prev / next) -->
					<div class="flex justify-center md:justify-start pb-4 mb-4">
						<button type="button" id="case-study-prev" class="btn btn-sm btn-circle border-0 text-primary bg-white hover:text-white hover:bg-primary mr-2">
							<x-heroicon-o-chevron-left class="w-5 h-5"/>
						</button>
						<button type="button" id="case-study-next" class="btn btn-sm btn-circle border-0 text-primary bg-white hover:text-white hover:bg-primary mr-2">
							<x-heroicon-o-chevron-right class="w-5 h-5"/>
						</button>
					</div>

					<!-- Card -->
					<div class="card bg-white shadow-sm p-4">
						<div class="card-body">
							<div class="js-swiper swiper w-full" data-swiper-options='{
		                      "spaceBetween": 30,
		                      "loop": true,
		                      "tabs": true,
		                      "speed": 800,
		                      "autoplay": {
		                        "delay": 5000,
		                        "disableOnInteraction": false
		                      },
		                      "navigation": {
		                        "prevEl": "#case-study-prev",
		                        "nextEl": "#case-study-next"
		                      }
		                    }'>
								<div class="swiper-wrapper {{ $sliderclass }}">

									@foreach($widgetsliders as $widgetslider)
										<div class="swiper-slide" data-swiper-tab="#image-{{ $widgetslider->id }}">
											{!! Theme::img('images/case-study-logo-'. $loop->iteration . '.png', 'Logo', 'block mb-4', ['width' => '72']) !!}
											<h4 class="text-2xl font-bold mb-2">{{ $widgetslider->title }}</h4>
											<p class="text-sm text-gray-600 border-b-1 border-gray-200 pb-4 mb-4">
												{{ $widgetslider->subtitle }}
											</p>
											<p class="pb-2 lg:pb-4 mb-4">
												{{ strip_tags($widgetslider->payoff) }}
											</p>
											<a href="#" class="btn btn-primary">View case study</a>
										</div>
									@endforeach

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endif