@if($widgetObjects)

	<div class="js-swiper swiper -mx-2" data-swiper-options='{
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

			@foreach ($widgetObjects as $widgetObject)

				<div class="swiper-slide py-4">
					@if($widgetObject->hasThumb())
						<a href="{{ $widgetObject->url }}" class="card border-1 border-gray-300 py-4 px-2 mx-2">
							@include('_img.glide', ['media' => $widgetObject->thumb(), 'width' => 960, 'height' => 480, 'ratio' => '2/1', 'class' => 'd-block mx-auto my-8' ])
						</a>
					@endif
				</div>
			@endforeach

		</div>

		<!-- Pagination (bullets) -->
		<div class="swiper-pagination !relative mt-2"></div>
	</div>

@endif


