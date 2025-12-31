@if($larawidget)

	<h2 class="mb-8 py-8 text-dark">{{ $larawidget->title }}</h2>

	<div id="social-links">
		<ul class="nav flex-column mb-8 mb-lg-0">

			@if(isset($settngz->company_facebook_account) && $settngz->company_facebook_account)
				<li class="nav-item">
					<a class="nav-link d-inline-block px-0 pt-4 pb-8"
					   href="https://www.facebook.com/{{ $settngz->company_facebook_account }}"
					   target="_blank">
						Facebook
					</a>
				</li>
			@endif

			@if(isset($settngz->company_instagram_account) && $settngz->company_instagram_account)
				<li class="nav-item">
					<a class="nav-link d-inline-block px-0 pt-4 pb-8"
					   href="https://www.instagram.com/{{ $settngz->company_instagram_account }}"
					   target="_blank">
						Instagram
					</a>
				</li>
			@endif

			@if(isset($settngz->company_twitter_account) && $settngz->company_twitter_account)
				<li class="nav-item">
					<a class="nav-link d-inline-block px-0 pt-4 pb-8"
					   href="https://twitter.com/{{ $settngz->company_twitter_account }}"
					   target="_blank">
						Twitter
					</a>
				</li>
			@endif

			@if(isset($settngz->company_linkedin_account) && $settngz->company_linkedin_account)
				<li class="nav-item">
					<a class="nav-link d-inline-block px-0 pt-4 pb-8"
					   href="https://www.linkedin.com/in/{{ $settngz->company_linkedin_account }}"
					   target="_blank">
						LinkedIn
					</a>
				</li>
			@endif

		</ul>
	</div>


@endif