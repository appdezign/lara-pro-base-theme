@if($type == 'menu')

	@if (Auth::check())
		<div class="dropdown login-widget-dropdown me-16">
			<a class="btn btn-sm btn-outline-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
			   data-bs-toggle="dropdown" aria-expanded="false">
				<i class="far fa-user-circle fs-16 lh-1 me-lg-8"></i>
				<span class="d-none d-lg-inline-block">{{ Auth::user()->username }}</span>
			</a>

			<ul class="dropdown-menu dropdown-menu-end mt-8" aria-labelledby="dropdownMenuLink">

				<li>
					<a class="dropdown-item" href="#">
						{{ Auth::user()->name }}
					</a>
				</li>
				<li><hr class="dropdown-divider"></li>

				<li>
					<a class="dropdown-item" href="{{ route('special.user.profile') }}">
						{{ _q('lara-front::user.menu.profile') }}
					</a>
				</li>

				@if(Auth::user()->hasLevel(90))
					<li>
						<a class="dropdown-item" href="{{ route('admin.dashboard.index') }}" target="_blank">
							{{ _q('lara-front::user.menu.dashboard') }}
						</a>
					</li>
				@endif

				<li>
					<a href="{{ route('logout') }}"
					   class="dropdown-item"
					   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						{{ _q('lara-front::user.menu.logouttext') }}
					</a>
				</li>
			</ul>
		</div>
	@else
		<a href="{{ route('login', ['returnto' => $returnto]) }}" class="btn btn-sm btn-outline-primary">
			<i class="far fa-user-circle fs-16 lh-1"></i>
		</a>
	@endif

@elseif($type == 'link')

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

@elseif($type == 'user')

	@if (Auth::check())
		{{ Auth::user()->name }}
	@endif

@endif
