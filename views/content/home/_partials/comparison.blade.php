<div class="flex w-full relative overflow-hidden">
	<div class="relative xl:shrink-0 z-5 left-1/2 -translate-x-1/2" style="max-width: 1920px;">
		<div class="md:-mx-12 xl:mx-0">
			<div class="-mx-6 sm:-mx-12 xl:mx-0">
				<div class="-mx-12 xl:mx-0">
					<img-comparison-slider class="-mx-12 xl:mx-0 outline-none">
						{!! Theme::img('images/dark-mode.jpg', 'Dark Mode', '', ['slot' => 'first']) !!}
						{!! Theme::img('images/light-mode.jpg', 'Light Mode', '', ['slot' => 'second']) !!}
						<div slot="handle" style="width: 36px;">
							<svg class="text-primary shadow-primary rounded-circle" width="36" height="36"
							     xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 36 36">
								<g>
									<circle fill="currentColor" cx="18" cy="18" r="18"/>
								</g>
								<path fill="#fff"
								      d="M22.2,17.2h-8.3v-3.3L9.7,18l4.2,4.2v-3.3h8.3v3.3l4.2-4.2l-4.2-4.2V17.2z"/>
							</svg>
						</div>
					</img-comparison-slider>
				</div>
			</div>
		</div>
	</div>
</div>