@if (Auth::check())
	<a href="{{ route('logout') }}" class="topbar-social-icon"
	   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
		{{ _q('lara-front::default.button.logouttext') }}
	</a>
@else
	<a href="{{ route('login', ['returnto' => $returnto]) }}" class="topbar-social-icon">
		{{ _q('lara-front::default.button.logintext') }}
	</a>
@endif