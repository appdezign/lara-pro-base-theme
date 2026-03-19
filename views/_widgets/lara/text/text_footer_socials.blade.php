@if($larawidget)

	<h2 class="mb-8 text-xl font-bold">{{ $larawidget->title }}</h2>

	<ul class="opacity-80">

		@if(isset($settngz->company_facebook_account) && $settngz->company_facebook_account)
			<li>
				<a
						href="https://www.facebook.com/{{ $settngz->company_facebook_account }}"
						target="_blank">
					Facebook
				</a>
			</li>
		@endif

		@if(isset($settngz->company_instagram_account) && $settngz->company_instagram_account)
			<li>
				<a
						href="https://www.instagram.com/{{ $settngz->company_instagram_account }}"
						target="_blank">
					Instagram
				</a>
			</li>
		@endif

		@if(isset($settngz->company_twitter_account) && $settngz->company_twitter_account)
			<li>
				<a
						href="https://twitter.com/{{ $settngz->company_twitter_account }}"
						target="_blank">
					Twitter
				</a>
			</li>
		@endif

		@if(isset($settngz->company_linkedin_account) && $settngz->company_linkedin_account)
			<li>
				<a
						href="https://www.linkedin.com/in/{{ $settngz->company_linkedin_account }}"
						target="_blank">
					LinkedIn
				</a>
			</li>
		@endif

	</ul>

@endif