@if($larawidget)

	<h2 class="mb-8 text-xl font-bold">{{ $larawidget->title }}</h2>

	<ul class="opacity-80">

		@if(isset($globalsettings->company_facebook_account) && $globalsettings->company_facebook_account)
			<li>
				<a
						href="https://www.facebook.com/{{ $globalsettings->company_facebook_account }}"
						target="_blank">
					Facebook
				</a>
			</li>
		@endif

		@if(isset($globalsettings->company_instagram_account) && $globalsettings->company_instagram_account)
			<li>
				<a
						href="https://www.instagram.com/{{ $globalsettings->company_instagram_account }}"
						target="_blank">
					Instagram
				</a>
			</li>
		@endif

		@if(isset($globalsettings->company_twitter_account) && $globalsettings->company_twitter_account)
			<li>
				<a
						href="https://twitter.com/{{ $globalsettings->company_twitter_account }}"
						target="_blank">
					Twitter
				</a>
			</li>
		@endif

		@if(isset($globalsettings->company_linkedin_account) && $globalsettings->company_linkedin_account)
			<li>
				<a
						href="https://www.linkedin.com/in/{{ $globalsettings->company_linkedin_account }}"
						target="_blank">
					LinkedIn
				</a>
			</li>
		@endif

	</ul>

@endif