@if($widgetObjects)

	<section class="py-12">
		<div class="container">

			<h2 class="mb-12 text-center">
				{{ $larawidget->title }}
			</h2>

			<div class="relative md:px-8">

				<!-- Slider controls (Prev / next) -->
				<div class="swiper-button-prev hidden md:flex rounded-full bg-white hover:bg-primary"></div>
				<div class="swiper-button-next hidden md:flex rounded-full bg-white hover:bg-primary"></div>

				<!-- Swiper slider -->
				<div class="js-swiper swiper swiper-nav-onhover mx-n8" data-swiper-options='{
		              "slidesPerView": 1,
		              "loop": true,
		              "spaceBetween": 8,
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
		              },
		              "breakpoints": {
		                "0": {
		                  "slidesPerView": 1
		                },
                "768": {
		                  "slidesPerView": 2
		                },
		                "992": {
		                  "slidesPerView": 3
		                }
		              }
		            }'>
					<div class="swiper-wrapper">

						@foreach($widgetObjects as $widgetObject)

							<div class="swiper-slide swiper-slide-eqh self-stretch py-4">
								<article class="card p-8 md:p-4 bg-white border-0 shadow-sm card-hover-primary h-full mx-2">
									<div class="card-body h-full">

										<div class="flex items-center justify-between mb-4">
											<a href="#"
											   class="relative inline-block px-2 py-1 text-sm bg-indigo-100 rounded no-underline z-2">
												@foreach($widgetObject->tags->where('taxonomy_id', 2) as $tag)
													{{ $tag->title }}
												@endforeach
											</a>
											<span class="text-sm text-gray-500">
												{{ Carbon\Carbon::parse($widgetObject->publish_from)->format('F d, Y') }}
											</span>
										</div>

										<h4 class="h4">
											<a href="#">
												{{ $widgetObject->title }}
											</a>
										</h4>

										@if($widgetObject->hasThumb())
											<div class="mb-4">
												<a href="{{ route($widgetEntitySingleRoute, $widgetObject->slug) }}">
													<div class="aspect-2/1">
														@include('_img.glide', ['media' => $widgetObject->thumb(), 'width' => 960, 'height' => 480, 'ratio' => '2/1', 'class' => 'object-cover' ])
													</div>
												</a>
											</div>
										@endif

										<p class="mb-0">{!! $widgetObject->lead !!}</p>
									</div>

								</article>
							</div>
						@endforeach
					</div>

					<!-- Pagination (bullets) -->
					<div class="swiper-pagination !relative pt-2 mt-2"></div>
				</div>
			</div>
		</div>
	</section>

@endif
