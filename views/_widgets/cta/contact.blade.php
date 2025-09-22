@if($widgetcta)

	<!-- CTA -->
	<div class="bg-wrapper position-relative" data-aos="fade-up">

		<div class="bg-dark position-absolute bottom-0 start-0 end-0 w-100" style="height:150px;">&nbsp;</div>

		<section class="container position-relative">
			<div class="bg-secondary rounded-3 py-48 px-16 px-sm-24 px-lg-0">
				<div class="row align-items-center pt-4 pb-8 py-lg-24">
					<div class="col-xl-4 col-lg-5 col-md-6 offset-lg-1 mb-24 pb-16 mb-md-0 pb-md-0">

						<h2 class="h1 mb-lg-24">
							{{ $widgetcta->title }}
						</h2>

						<p class="pb-8 pb-md-24 pb-lg-48">{{ $widgetcta->body }}</p>

						<h2 class="mb-lg-24">
							Contact Info
						</h2>

						<ul class="list-unstyled pb-16 pb-md-24 pb-lg-48 mb-8">
							<li class="mb-8">
								<div class="row">
									<a href="tel:+31852006261" class="nav-link p-0">
										<div class="col-1 px-0">
											<i class="fad fa-lg fa-phone text-primary  me-8"></i>
										</div>
										<div class="col-11">
											085 2006261
										</div>
									</a>
								</div>
							</li>
							<li class="mb-8">

								<div class="row">
									<a href="mailto:example@email.com" class="nav-link p-0">
										<div class="col-1 px-0">
											<i class="fad fa-lg fa-envelope text-primary  me-8"></i>
										</div>
										<div class="col-11">
											info@firmaq.nl
										</div>
									</a>
								</div>
							</li>
							<li class="mb-8">
								<div class="row">
									<a href="#" class="nav-link p-0">
										<div class="col-1 px-0">
											<i class="fad fa-lg fa-map-marker-alt text-primary me-8"></i>
										</div>
										<div class="col-11">
											Schipholweg 66, 2035 LB, Haarlem
										</div>
									</a>
								</div>
							</li>
						</ul>
						<div class="d-flex">
							<a href="#" class="btn btn-icon btn-outline-secondary btn-facebook me-16">
								<i class="fab fa-facebook-f fs-15"></i>
							</a>
							<a href="#" class="btn btn-icon btn-outline-secondary btn-twitter me-16">
								<i class="fab fa-twitter fs-15"></i>
							</a>
							<a href="#" class="btn btn-icon btn-outline-secondary btn-linkedin me-16">
								<i class="fab fa-linkedin-in fs-15"></i>
							</a>
							<a href="#" class="btn btn-icon btn-outline-secondary btn-instagram">
								<i class="fab fa-instagram fs-15"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-5 col-md-6 offset-xl-1">
						<div class="card border-0 shadow-sm p-sm-8">
							<form class="card-body needs-validation" novalidate>
								<div class="mb-24">
									<label for="service" class="form-label fs-base">Service</label>
									<select id="service" class="form-select form-select-lg" required>
										<option value="" selected disabled>Choose the service you are interested in
										</option>
										<option value="Custom Software Development">Custom Software Development</option>
										<option value="Software Integration">Software Integration</option>
										<option value="Mobile App Development">Mobile App Development</option>
										<option value="Business Analytics">Business Analytics</option>
										<option value="Software Testing">Software Testing</option>
										<option value="Project Management">Project Management</option>
									</select>
									<div class="invalid-feedback">Please choose the service!</div>
								</div>
								<div class="mb-24">
									<label for="name" class="form-label fs-base">Full name</label>
									<input type="text" id="name" class="form-control form-control-lg" required>
									<div class="invalid-feedback">Please enter your name!</div>
								</div>
								<div class="mb-24">
									<label for="email" class="form-label fs-base">Email address</label>
									<input type="email" id="email" class="form-control form-control-lg" required>
									<div class="invalid-feedback">Please provide a valid email address!</div>
								</div>
								<div class="mb-24 pb-8">
									<label for="message" class="form-label fs-base">Email address</label>
									<textarea id="message" class="form-control form-control-lg" rows="3"
									          placeholder="Tell us about your project" required></textarea>
									<div class="invalid-feedback">Please enter you message!</div>
								</div>
								<button type="submit" class="btn btn-primary shadow-primary btn-lg">Send request
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

@endif
