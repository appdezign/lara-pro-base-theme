@if($widgetcta)

	<!-- CTA -->
	<div class="relative" data-aos="fade-up">

		<div class="absolute bottom-0 start-0 end-0 w-full" style="background-color: #0f172a; height:150px;">&nbsp;
		</div>

		<section class="container relative">
			<div class="bg-secondary rounded-lg py-12 px-4 sm:px-6 lg:px-0">
				<div class="grid grid-cols-12 gap-8 items-center pt-1 pb-2 lg:py-6">

					<div class="col-span-12 md:col-span-6 lg:col-span-5 lg:col-start-2 xl:col-span-4 xl:col-start-2 mb-6 pb-4 md:mb-0 md:pb-0">

						<h2 class="h1 lg:mb-6">
							{{ $widgetcta->title }}
						</h2>

						<p class="pb-2 md:pb-6 lg:pb-12">{{ strip_tags($widgetcta->body) }}</p>

						<h4 class="lg:mb-6">
							Contact Info
						</h4>

						<ul class="list-none pb-4 md:pb-6 lg:pb-12 mb-2">
							<li class="mb-2">
								<div class="grid grid-cols-12">
									<div class="col-span-1 px-0">
										<x-heroicon-s-phone class="w-5 h-5 text-primary"/>
									</div>
									<div class="col-span-11">
										085 2006261
									</div>
								</div>
							</li>
							<li class="mb-2">
								<div class="grid grid-cols-12">

									<div class="col-span-1 px-0">
										<x-heroicon-s-envelope class="w-5 h-5 text-primary"/>
									</div>
									<div class="col-span-11">
										<a href="mailto:example@email.com">
											info@firmaq.nl
										</a>
									</div>
									</a>
								</div>
							</li>
							<li class="mb-2">
								<div class="grid grid-cols-12">
									<div class="col-span-1 px-0">
										<x-heroicon-s-map-pin class="w-5 h-5 text-primary"/>
									</div>
									<div class="col-span-11">
										Schipholweg 66, 2035 LB, Haarlem
									</div>
								</div>
							</li>
						</ul>
						<div class="d-flex">
							<a href="#" class="btn btn-soft btn-primary !border-1 !border-primary me-4">
								@include('_icons.facebook', ['iconclasses' => 'w-4 h-4'])
							</a>
							<a href="#" class="btn btn-soft btn-primary !border-1 !border-primary me-4">
								@include('_icons.twitter', ['iconclasses' => 'w-4 h-4'])
							</a>
							<a href="#" class="btn btn-soft btn-primary !border-1 !border-primary me-4">
								@include('_icons.linkedin', ['iconclasses' => 'w-4 h-4'])
							</a>
							<a href="#" class="btn btn-soft btn-primary !border-1 !border-primary">
								@include('_icons.instagram', ['iconclasses' => 'w-4 h-4'])
							</a>
						</div>
					</div>

					<div class="col-span-12 md:col-span-6 lg:col-span-5 xl:col-span-5 xl:col-start-7">

						<div class="card bg-white shadow-sm sm:p-2">
							<form class="card-body needs-validation" novalidate>

								<fieldset class="fieldset w-full">
									<legend class="fieldset-legend">Service</legend>
									<select class="select w-full">
										<option value="" selected disabled>Choose the service you are interested in
										</option>
										<option value="Custom Software Development">Custom Software Development</option>
										<option value="Software Integration">Software Integration</option>
										<option value="Mobile App Development">Mobile App Development</option>
										<option value="Business Analytics">Business Analytics</option>
										<option value="Software Testing">Software Testing</option>
										<option value="Project Management">Project Management</option>
									</select>
								</fieldset>
								<fieldset class="fieldset w-full">
									<legend class="fieldset-legend">Full name?</legend>
									<input type="text" name="name" class="input w-full"/>
								</fieldset>
								<fieldset class="fieldset w-full">
									<legend class="fieldset-legend">Email address</legend>
									<input type="email" name="email" class="input w-full"/>
								</fieldset>
								<fieldset class="fieldset w-full">
									<legend class="fieldset-legend">Comment</legend>
									<textarea class="textarea w-full"></textarea>
								</fieldset>

								<button type="submit" class="btn btn-lg btn-primary">Send request</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

@endif
