@if(!empty($widgetObjects))

	<section class="lara-section" data-aos="fade-up">
		<div class="container">

			<div class="grid grid-cols-12 gap-8">
				<div class="col-span-12 md:col-span-5">
					<div class="card h-full border-none overflow-hidden md:px-6">
						<span class="bg-gradient-primary absolute top-0 start-0 w-full h-full opacity-10 hidden md:block"></span>
						<div class="card-body flex flex-column items-center justify-center relative z-2 p-0 pb-2 lg:p-6">
							<h2 class="h1 text-center md:text-start lg:p-6">
								{{ $larawidget->title }}
							</h2>
						</div>
					</div>
				</div>
				<div class="col-span-12 md:col-span-7">

					<div class="p-12 shadow-md rounded-lg">
						<div class="flex justify-between pb-6 mb-2">
			                <span class="btn btn-primary btn-lg rounded-lg shadow-sm shadow-primary text-white">
			                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24" height="24">
				                  <path d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z" fill="currentColor" />

			                  </svg>
			                </span>

							<div class="flex">
								<button type="button" id="testimonials-prev" class="btn btn-circle btn-soft btn-primary btn-sm me-2">
									<x-heroicon-o-chevron-left class="w-5 h-5" />
								</button>
								<button type="button" id="testimonials-next" class="btn btn-circle btn-soft btn-primary btn-sm ms-2">
									<x-heroicon-o-chevron-right class="w-5 h-5" />
								</button>
							</div>
						</div>

						<!-- Slider -->
						<div class="js-swiper swiper mx-0 md:-mb-2 2xl:-mb-4" data-swiper-options='{
				                "spaceBetween": 24,
				                "speed": 800,
				                "autoplay": {
				                  "delay": 500000,
				                  "disableOnInteraction": false
				                },
				                "loop": true,
				                "pagination": {
				                  "el": ".swiper-pagination",
				                  "clickable": true
				                },
				                "navigation": {
				                  "prevEl": "#testimonials-prev",
				                  "nextEl": "#testimonials-next"
				                }
				              }'>
							<div class="swiper-wrapper">

								@foreach($widgetObjects as $widgetObject)
									<div class="swiper-slide">
										<figure class="relative border-0 bg-transparent">

											<blockquote class="mb-8">
												{!! $widgetObject->lead  !!}
											</blockquote>

											<figcaption class="flex items-center w-full pb-2 border-none">
												@if($widgetObject->HasThumb())
													<img data-src="{{ glide()->getUrl($widgetObject->thumb()->path, ['w' => 60, 'h' => 60, 'fit' => 'crop']) }}"
													     width="60"
													     height="60"
													     title="{{ $widgetObject->thumb()->title }}"
													     alt="{{$widgetObject->thumb()->alt }}"
													     class="lazyload rounded-full"/>
												@endif
												<div class="ps-4">
													<h3 class="h6 mb-0">
														{{ $widgetObject->title }}
													</h3>
													<span class="text-sm text-gray-500">
														{{ $widgetObject->role }}
													</span>
												</div>
											</figcaption>
										</figure>
									</div>
								@endforeach

							</div>

							<!-- Pagination (bullets) -->
							<div class="swiper-pagination position-relative mt-48"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endif
