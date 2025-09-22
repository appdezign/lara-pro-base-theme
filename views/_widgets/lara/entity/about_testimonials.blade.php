@if(!empty($widgetObjects))

	<section class="container" data-aos="fade-up">
		<div class="row">
			<div class="col-md-5">
				<div class="card h-100 border-0 overflow-hidden px-md-24">
					<span class="bg-gradient-primary position-absolute top-0 start-0 w-100 h-100 opacity-10 d-none d-md-block"></span>
					<div class="card-body d-flex flex-column align-items-center justify-content-center position-relative zindex-2 p-0 pb-8 p-lg-24">

						<h2 class="h1 text-center text-md-start p-lg-24">
							{{ $larawidget->title }}
						</h2>

					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="card border-0 shadow-sm p-24 p-xxl-48">
					<div class="d-flex justify-content-between pb-24 mb-8">
                <span class="btn btn-icon btn-primary btn-lg shadow-primary pe-none">
                  <i class="fas fa-quote-left"></i>
                </span>
						<div class="d-flex">
							<button type="button" id="testimonials-prev" class="btn btn-prev btn-icon btn-sm me-8">
								<i class="far fa-chevron-left fs-14"></i>
							</button>
							<button type="button" id="testimonials-next" class="btn btn-next btn-icon btn-sm ms-8">
								<i class="far fa-chevron-right fs-14"></i>
							</button>
						</div>
					</div>

					<!-- Slider -->
					<div class="js-swiper swiper mx-0 mb-md-n8 mb-xxl-n16" data-swiper-options='{
                "spaceBetween": 24,
                "speed": 800,
                "autoplay": {
                  "delay": 5000,
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
								<div class="swiper-slide h-auto">
									<figure class="card h-100 position-relative border-0 bg-transparent">
										<blockquote class="card-body p-0 mb-0">
											<p class="fs-lg mb-0">
												{!! $widgetObject->lead  !!}
											</p>
										</blockquote>
										<figcaption class="card-footer border-0 d-flex align-items-center w-100 pb-8">
											<img data-src="{{ _cimg($widgetObject->getThumbOrFeatured()->filename, 60, 60) }}"
											     width="60"
											     height="60"
											     title="{{ $widgetObject->getThumbOrFeatured()->seo_title }}"
											     alt="{{ $widgetObject->getThumbOrFeatured()->seo_alt }}"
											     class="lazyload rounded-circle"/>
											<div class="ps-16">
												<h3 class="h6 fw-semibold lh-base mb-0">
													{{ $widgetObject->title }}
												</h3>
												<span class="fs-14 text-muted">
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
	</section>
@endif
