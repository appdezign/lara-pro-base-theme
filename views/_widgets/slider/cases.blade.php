@if(!empty($widgetsliders))

	<div class="position-relative py-lg-24 py-xl-48">

		<!-- Swiper tabs -->
		<div class="swiper-tabs position-absolute top-0 start-0 w-100 h-100">
			@foreach($widgetsliders as $widgetslider)
				<div id="image-{{ $widgetslider->id }}" class="jarallax position-absolute top-0 start-0 w-100 h-100 swiper-tab active" data-jarallax data-speed="0.4">
					<span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-35"></span>
					<div class="jarallax-img"
					     style="background-image: url({{ _cimg($widgetslider->getFeatured()->filename, 1920, 960) }});"></div>
				</div>
			@endforeach
		</div>

		<!-- Swiper slider -->
		<div class="container position-relative zindex-5 py-48">
			<div class="row py-8 py-md-16">
				<div class="col-xl-5 col-lg-7 col-md-9">

					<!-- Slider controls (Prev / next) -->
					<div class="d-flex justify-content-center justify-content-md-start pb-16 mb-16">
						<button type="button" id="case-study-prev" class="btn btn-prev btn-icon btn-sm bg-white me-8">
							<i class="far fa-chevron-left fs-14"></i>
						</button>
						<button type="button" id="case-study-next" class="btn btn-next btn-icon btn-sm bg-white ms-8">
							<i class="far fa-chevron-right fs-14"></i>
						</button>
					</div>

					<!-- Card -->
					<div class="card bg-white shadow-sm p-16">
						<div class="card-body">
							<div class="js-swiper swiper" data-swiper-options='{
                      "spaceBetween": 30,
                      "loop": true,
                      "tabs": true,
                      "speed": 800,
                      "autoplay": {
                        "delay": 5000,
                        "disableOnInteraction": false
                      },
                      "pagination": {
                        "el": "#case-study-pagination",
                        "clickable": true
                      },
                      "navigation": {
                        "prevEl": "#case-study-prev",
                        "nextEl": "#case-study-next"
                      }
                    }'>
								<div class="swiper-wrapper {{ $sliderclass }}">
									@foreach($widgetsliders as $widgetslider)
										<div class="swiper-slide" data-swiper-tab="#image-{{ $widgetslider->id }}">
											{!! Theme::img('images/case-study-logo-'. $loop->iteration . '.png', 'Logo', 'd-block mb-16', ['width' => '72']) !!}

											<h4 class="mb-8">{{ $widgetslider->title }}</h4>

											<p class="fs-14 text-muted border-bottom pb-16 mb-16">{{ $widgetslider->subtitle }}</p>
											<p class="pb-8 pb-lg-16 mb-16">{!! $widgetslider->payoff  !!}</p>
											<a href="#" class="btn btn-primary">View case study</a>
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>

					<!-- Pagination (bullets) -->
					<div class="dark-mode pt-24 mt-16">
						<div id="case-study-pagination" class="swiper-pagination position-relative bottom-0"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endif
