@if($widgetcta)
	<!-- CTA -->
	<section class="py-12 bg-secondary relative">

		<div class="container md:py-4 lg:py-12">
			<div class="grid grid-cols-12">
				<div class="col-span-12 md:col-span-10 md:col-start-2 lg:col-span-8 lg:col-start-3 xl:col-span-6 xl:col-start-4">

					<h2 class="h1 sm:mb-6 md:mb-12 text-center">
						{{ $widgetcta->title }}
					</h2>

					<div class="grid grid-cols-12 gy-1 items-center mb-6 lg:mb-12 pb-4">

						<div class="col-span-12 md:col-span-4">
							<h4 class="h5 mb-0">{!! $widgetcta->body  !!}</h4>
						</div>

						<div class="col-span-12 md:col-span-8">

							<div class="grid grid-cols-12 gap-4">

								<div class="col-span-12 md:col-span-6">

									<label class="label text-neutral">
										<input type="checkbox" class="checkbox checkbox-sm rounded-sm checkbox border-primary bg-white checked:bg-primary checked:text-white">
										Daily Newsletter
									</label>
									<label class="label text-neutral">
										<input type="checkbox" class="checkbox checkbox-sm rounded-sm checkbox border-primary bg-white checked:bg-primary checked:text-white" checked>
										Advertising Updates
									</label>
									<label class="label text-neutral">
										<input type="checkbox" class="checkbox checkbox-sm rounded-sm checkbox border-primary bg-white checked:bg-primary checked:text-white">
										Week in Review
									</label>
								</div>
								<div class="col-span-12 md:col-span-6">
									<label class="label text-neutral">
										<input type="checkbox" class="checkbox checkbox-sm rounded-sm checkbox border-primary bg-white checked:bg-primary checked:text-white">
										Event Updates
									</label>
									<label class="label text-neutral">
										<input type="checkbox" class="checkbox checkbox-sm rounded-sm checkbox border-primary bg-white checked:bg-primary checked:text-white">
										Startups Weekly
									</label>
									<label class="label text-neutral">
										<input type="checkbox" class="checkbox checkbox-sm rounded-sm checkbox border-primary bg-white checked:bg-primary checked:text-white">
										Podcasts
									</label>
								</div>
							</div>
						</div>
					</div>


					<div class="join flex">
						<div class="grow-1">
							<label class="input validator join-item flex w-full">
								<svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
									<g
											stroke-linejoin="round"
											stroke-linecap="round"
											stroke-width="2.5"
											fill="none"
											stroke="currentColor"
									>
										<rect width="20" height="16" x="2" y="4" rx="2"></rect>
										<path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
									</g>
								</svg>
								<input type="email" placeholder="Your email" required="">
							</label>
							<div class="validator-hint hidden">Enter valid email address</div>
						</div>
						<button class="btn btn-primary join-item">Subscribe</button>
					</div>

					<div class="mt-4 text-sm">
						* Yes, I agree to the <a href="#" class="text-primary">terms</a> and <a href="#"  class="text-primary">privacy policy</a>.
					</div>

				</div>
			</div>
		</div>

		<div class="absolute end-0 bottom-0 text-primary">
			<svg width="416" height="444" viewBox="0 0 416 444" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.08" fill-rule="evenodd" clip-rule="evenodd" d="M240.875 615.746C389.471 695.311 562.783 640.474 631.69 504.818C700.597 369.163 645.201 191.864 496.604 112.299C348.007 32.7335 174.696 87.5709 105.789 223.227C36.8815 358.882 92.278 536.18 240.875 615.746ZM208.043 680.381C388.035 776.757 605.894 713.247 694.644 538.527C783.394 363.807 709.428 144.04 529.436 47.6636C349.443 -48.7125 131.584 14.7978 42.8343 189.518C-45.916 364.238 28.0504 584.005 208.043 680.381Z" fill="currentColor"></path><path opacity="0.08" fill-rule="evenodd" clip-rule="evenodd" d="M262.68 572.818C382.909 637.194 526.686 594.13 584.805 479.713C642.924 365.295 595.028 219.601 474.799 155.224C354.57 90.8479 210.793 133.912 152.674 248.33C94.5545 362.747 142.45 508.442 262.68 572.818ZM253.924 590.054C382.526 658.913 538.182 613.536 601.593 488.702C665.004 363.867 612.156 206.847 483.554 137.988C354.953 69.129 199.296 114.506 135.886 239.341C72.4752 364.175 125.323 521.195 253.924 590.054Z" fill="currentColor"></path></svg>
		</div>
	</section>

@endif
