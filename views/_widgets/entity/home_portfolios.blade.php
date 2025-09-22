@if(!empty($widgetObjects))

	<div class="js-swiper swiper mx-n8" data-swiper-options='{
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
              "slidesPerView": 2,
              "spaceBetween": 8
            },
            "650": {
              "slidesPerView": 3,
              "spaceBetween": 8
            },
            "900": {
              "slidesPerView": 4,
              "spaceBetween": 8
            },
            "1100": {
              "slidesPerView": 5,
              "spaceBetween": 8
            }
          }
        }'>
		<div class="swiper-wrapper">
			@foreach($widgetObjects as $widgetObject)

				<div class="swiper-slide py-16">
					@if($widgetObject->hasThumbOrFeatured())
						<a href="{{ $widgetObject->url }}" class="card card-body card-hover px-8 mx-8">
							@include('_img.lazy', ['lzobj' => $widgetObject->getThumbOrFeatured(), 'lzw' => 960, 'lzh' => 480, 'ar' => '2x1', 'cl' => 'd-block mx-auto my-8'])
						</a>
					@endif
				</div>

			@endforeach
		</div>

		<!-- Pagination (bullets) -->
		<div class="swiper-pagination position-relative pt-8 mt-24"></div>
	</div>
@endif
