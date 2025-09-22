
@if(($entity->getResourceSlug() == 'page' && isset($data->page) && $data->page->ishome == 0) || ($entity->getEgroup() == 'entity' && $activeroute->getMethod() == 'show'))


<section class="lara-sharing py-48">
	<div class="container">
		<div class="row text-center">

			<div class="mb-20">Deel deze pagina</div>

			<div class="lara-sharing-buttons">

				{{-- https://sharingbuttons.io/ --}}

				<!-- Facebook -->
				<a class="resp-sharing-button__link facebook-share-button"
				   href="https://facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"
				   rel="noopener" aria-label="Facebook">
					<div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--medium">
						<div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/>
							</svg>
						</div>
						<div class="d-md-inline d-lg-inline">Facebook</div>
					</div>
				</a>

				<!-- Twitter -->
				<a class="resp-sharing-button__link twitter-share-button"
				   href="https://twitter.com/intent/tweet/?text={{ urlencode($data->seo->seo_title) }}&amp;url={{ urlencode(url()->current()) }}"
				   target="_blank" rel="noopener" aria-label="Twitter">
					<div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--medium">
						<div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
							<svg width="100%" height="100%" viewBox="0 0 512 463" xmlns="http://www.w3.org/2000/svg">
							    <path d="M403.229,0L481.735,0L310.219,196.04L512,462.799L354.002,462.799L230.261,301.007L88.669,462.799L10.109,462.799L193.564,253.116L0,0L161.999,0L273.855,147.88L403.229,0ZM375.673,415.805L419.178,415.805L138.363,44.527L91.683,44.527L375.673,415.805Z" />
							</svg>
						</div>
						<div class="d-md-inline d-lg-inline">Twitter</div>
					</div>
				</a>

				<!-- E-Mail -->
				<a class="resp-sharing-button__link"
				   href="mailto:?subject={{ urlencode($data->seo->seo_title) }}&amp;body={{ urlencode(url()->current()) }}"
				   target="_self" rel="noopener" aria-label="E-Mail">
					<div class="resp-sharing-button resp-sharing-button--email resp-sharing-button--medium">
						<div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
								<path d="M22 4H2C.9 4 0 4.9 0 6v12c0 1.1.9 2 2 2h20c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zM7.25 14.43l-3.5 2c-.08.05-.17.07-.25.07-.17 0-.34-.1-.43-.25-.14-.24-.06-.55.18-.68l3.5-2c.24-.14.55-.06.68.18.14.24.06.55-.18.68zm4.75.07c-.1 0-.2-.03-.27-.08l-8.5-5.5c-.23-.15-.3-.46-.15-.7.15-.22.46-.3.7-.14L12 13.4l8.23-5.32c.23-.15.54-.08.7.15.14.23.07.54-.16.7l-8.5 5.5c-.08.04-.17.07-.27.07zm8.93 1.75c-.1.16-.26.25-.43.25-.08 0-.17-.02-.25-.07l-3.5-2c-.24-.13-.32-.44-.18-.68s.44-.32.68-.18l3.5 2c.24.13.32.44.18.68z"/>
							</svg>
						</div>
						<div class="d-md-inline d-lg-inline">E-Mail</div>
					</div>
				</a>
			</div>

		</div>
	</div>
</section>

@endif

@section('scripts-after')

	@parent

	<script>

		const facebookButton = document.querySelector('.facebook-share-button');
		if (facebookButton) {
			facebookButton.addEventListener('click', function (e) {
				e.preventDefault();
				let facebookUrl = this.getAttribute("href");
				window.open(facebookUrl, 'fbShareWindow', 'height=450, width=550, top=' + (window.screen.height / 2 - 275) + ', left=' + (window.screen.width / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
				return false;
				console.log()
			});
		}

		const twitterButton = document.querySelector('.twitter-share-button');
		if (twitterButton) {
			twitterButton.addEventListener('click', function (e) {
				e.preventDefault();
				let twitterUrl = this.getAttribute("href");
				window.open(twitterUrl, 'twShareWindow', 'height=450, width=550, top=' + (window.screen.height / 2 - 275) + ', left=' + (window.screen.width / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
				return false;
			});
		}

	</script>

@endsection
