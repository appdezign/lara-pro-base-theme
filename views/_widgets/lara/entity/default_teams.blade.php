@if(!empty($widgetObjects))

	<section class="container py-48 my-md-16 my-lg-48">

		<h2 class="h1 text-center pt-4 pb-16 mb-16 mb-lg-24">
			{{ $larawidget->title }}
		</h2>

		{!! $larawidget->body !!}

		<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-24">

			@foreach($widgetObjects as $widgetObject)

				<div class="col">
					<div class="card card-hover border-0 bg-transparent"
					     data-aos="fade-up">
						<div class="position-relative">

							@include('_img.lazy', ['lzobj' => $widgetObject->getThumbOrFeatured(), 'lzw' => 960, 'lzh' => 960, 'ar' => '1x1', 'cl' => 'rounded-3'])

							<div class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
								<span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-25 rounded-3"></span>
								<div class="position-relative d-flex zindex-2">

									@if(isset($settngz->company_facebook_account) && $settngz->company_facebook_account)
										<a href="https://www.facebook.com/{{ $settngz->company_facebook_account }}"
										   target="_blank"
										   class="btn btn-icon btn-secondary btn-facebook btn-sm bg-white me-8">
											<i class="fab fa-facebook-f fs-15"></i>
										</a>
									@endif

									@if(isset($settngz->company_linkedin_account) && $settngz->company_linkedin_account)
										<a href="https://www.linkedin.com/in/{{ $settngz->company_linkedin_account }}"
										   target="_blank"
										   class="btn btn-icon btn-secondary btn-linkedin btn-sm bg-white me-8">
											<i class="fab fa-linkedin-in fs-15"></i>
										</a>
									@endif

									@if(isset($settngz->company_twitter_account) && $settngz->company_twitter_account)
										<a href="https://twitter.com/{{ $settngz->company_twitter_account }}"
										   target="_blank"
										   class="btn btn-icon btn-secondary btn-twitter btn-sm bg-white">
											<i class="fab fa-twitter fs-15"></i>
										</a>
									@endif

								</div>
							</div>
						</div>

						<div class="card-body text-center p-16">

							<h3 class="fs-18 fw-semibold pt-4 mb-8">
								{{ $widgetObject->firstname.' '.$widgetObject->middlename.' '.$widgetObject->title }}
							</h3>

							<p class="fs-14 mb-0">{{ $widgetObject->role }}</p>

						</div>

					</div>
				</div>

			@endforeach

		</div>
	</section>

@endif
