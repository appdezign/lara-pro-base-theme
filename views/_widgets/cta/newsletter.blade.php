@if($widgetcta)
	<!-- CTA -->
	<section class="py-48 bg-secondary position-relative">

		<div class="container py-md-16 py-lg-48">
			<div class="row justify-content-center">
				<div class="col-xl-8 col-lg-9 col-md-11">

					<h2 class="h1 d-md-inline-block position-relative mb-md-48 mb-sm-24 text-sm-start text-center">{{ $widgetcta->title }}</h2>

					<!-- Title + checkboxes -->
					<div class="row gy-4 align-items-center mb-lg-48 mb-24 pb-16">
						<div class="col-md-3">

							<h4 class="h5 mb-0 text-sm-start text-center">{!! $widgetcta->body  !!}</h4>

						</div>
						<div class="col-md-9">
							<div class="row row-cols-sm-16 row-cols-2 gy-2">
								<div class="col">
									<div class="form-check mb-0">
										<input type="checkbox" id="s-daily-newsletter" class="form-check-input">
										<label for="s-daily-newsletter" class="form-check-label">Daily Newsletter</label>
									</div>
								</div>
								<div class="col">
									<div class="form-check mb-0">
										<input type="checkbox" id="s-advertising-updates" class="form-check-input" checked>
										<label for="s-advertising-updates" class="form-check-label">Advertising Updates</label>
									</div>
								</div>
								<div class="col">
									<div class="form-check mb-0">
										<input type="checkbox" id="s-week-in-review" class="form-check-input">
										<label for="s-week-in-review" class="form-check-label">Week in Review</label>
									</div>
								</div>
								<div class="col">
									<div class="form-check mb-0">
										<input type="checkbox" id="s-event-updates" class="form-check-input">
										<label for="s-event-updates" class="form-check-label">Event Updates</label>
									</div>
								</div>
								<div class="col">
									<div class="form-check mb-0">
										<input type="checkbox" id="s-startups-weekly" class="form-check-input">
										<label for="s-startups-weekly" class="form-check-label">Startups Weekly</label>
									</div>
								</div>
								<div class="col">
									<div class="form-check mb-0">
										<input id="s-podcasts" type="checkbox" class="form-check-input">
										<label for="s-podcasts" class="form-check-label">Podcasts</label>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Email field -->
					<form class="d-flex flex-sm-row flex-column mb-16 needs-validation" novalidate>
						<div class="input-group me-sm-16 mb-sm-0 mb-16">
							<i class="fal fa-envelope fs-16 position-absolute start-0 top-50 translate-middle-y ms-16 zindex-5 fs-5 text-muted"></i>
							<input type="email" class="form-control form-control-lg rounded-3 ps-48" placeholder="Your email" required>
							<div class="invalid-tooltip position-absolute start-0 top-0 mt-n24">Please provide a valid email address!</div>
						</div>
						<button class="btn btn-lg btn-primary">Subscribe *</button>
					</form>
					<div class="form-text fs-14 text-sm-start text-center">
						* Yes, I agree to the <a href="#">terms</a> and <a href="#">privacy policy</a>.
					</div>
				</div>
			</div>
		</div>

		<div class="position-absolute end-0 bottom-0 text-primary">
			<svg width="416" height="444" viewBox="0 0 416 444" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.08" fill-rule="evenodd" clip-rule="evenodd" d="M240.875 615.746C389.471 695.311 562.783 640.474 631.69 504.818C700.597 369.163 645.201 191.864 496.604 112.299C348.007 32.7335 174.696 87.5709 105.789 223.227C36.8815 358.882 92.278 536.18 240.875 615.746ZM208.043 680.381C388.035 776.757 605.894 713.247 694.644 538.527C783.394 363.807 709.428 144.04 529.436 47.6636C349.443 -48.7125 131.584 14.7978 42.8343 189.518C-45.916 364.238 28.0504 584.005 208.043 680.381Z" fill="currentColor"></path><path opacity="0.08" fill-rule="evenodd" clip-rule="evenodd" d="M262.68 572.818C382.909 637.194 526.686 594.13 584.805 479.713C642.924 365.295 595.028 219.601 474.799 155.224C354.57 90.8479 210.793 133.912 152.674 248.33C94.5545 362.747 142.45 508.442 262.68 572.818ZM253.924 590.054C382.526 658.913 538.182 613.536 601.593 488.702C665.004 363.867 612.156 206.847 483.554 137.988C354.953 69.129 199.296 114.506 135.886 239.341C72.4752 364.175 125.323 521.195 253.924 590.054Z" fill="currentColor"></path></svg>
		</div>
	</section>

@endif
