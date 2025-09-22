@if(!empty($widgetObjects))

	<section class="py-48">
		<div class="container py-md-16 py-lg-48">

			<h2 class="h1 text-center pb-8">
				{{ $larawidget->title }}
			</h2>

			<div class="position-relative mx-md-8 px-md-48">

				<!-- Slider controls (Prev / next) -->
				<button type="button" id="news-prev"
				        class="btn btn-prev btn-icon btn-sm position-absolute top-50 start-0 translate-middle-y mt-n24 d-none d-md-inline-flex">
					<i class="far fa-chevron-left fs-12"></i>
				</button>
				<button type="button" id="news-next"
				        class="btn btn-next btn-icon btn-sm position-absolute top-50 end-0 translate-middle-y mt-n24 d-none d-md-inline-flex">
					<i class="far fa-chevron-right fs-12"></i>
				</button>

				<!-- Swiper slider -->
				<div class="js-swiper swiper swiper-nav-onhover mx-n8" data-swiper-options='{
		              "slidesPerView": 1,
		              "loop": true,
		              "spaceBetween": 8,
		              "speed": 800,
		              "autoplay": {
		                "delay": 4000,
		                "disableOnInteraction": false
		              },
		              "pagination": {
		                "el": ".swiper-pagination",
		                "clickable": true
		              },
		              "navigation": {
		                "prevEl": "#news-prev",
		                "nextEl": "#news-next"
		              },
		              "breakpoints": {
		                "0": {
		                  "slidesPerView": 1
		                },
		                "560": {
		                  "slidesPerView": 2
		                },
		                "992": {
		                  "slidesPerView": 3
		                }
		              }
		            }'>
					<div class="swiper-wrapper">

						@foreach($widgetObjects as $widgetObject)

							<div class="swiper-slide h-auto py-16">
								<article class="card p-md-16 p-8 border-0 shadow-sm card-hover-primary h-100 mx-8">
									<div class="card-body pb-0">
										<div class="d-flex align-items-center justify-content-between mb-16">
											<a href="#"
											   class="badge fs-14 text-nav bg-secondary text-decoration-none position-relative zindex-2">
												@foreach($widgetObject->tags->where('taxonomy_id', 2) as $tag)
													{{ $tag->title }}
												@endforeach
											</a>
											<span class="fs-14 text-muted">
												{{ Carbon\Carbon::parse($widgetObject->publish_from)->format('F d, Y') }}
											</span>
										</div>

										<h3 class="h4">
											<a href="{{ route($widgetEntityRoute . '.show', $widgetObject->slug) }}"
											   class="stretched-link">
												{{ $widgetObject->title }}
											</a>
										</h3>

										@if($widgetObject->hasThumbOrFeatured())
											<div class="blog-featured-image mb-20">
												<a href="{{ route($widgetEntityRoute . '.show', $widgetObject->slug) }}">
													@include('_img.lazy', ['lzobj' => $widgetObject->getThumbOrFeatured(), 'lzw' => 960, 'lzh' => 480, 'ar' => '2x1'])
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
					<div class="swiper-pagination position-relative pt-8 pt-sm-16 mt-24"></div>
				</div>
			</div>
		</div>
	</section>

@endif
