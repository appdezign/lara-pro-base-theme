@if (Auth::check())

	<ul class="menu menu-horizontal">
		<li>
			<div class="dropdown dropdown-hover">
				<a tabindex="0" class="menu-dropdown-toggle">
					<x-heroicon-o-user-circle class="w-5 h-5 "/>
					<span class="hidden lg:inline-block">{{ Auth::user()->name }}</span>
				</a>
				<ul tabindex="-1" class="menu dropdown-content ">
					<li>
						<a href="#" class="menu-sub-link">{{ Auth::user()->name }}</a>
					</li>
					<li>
						<a class="menu-sub-link" href="{{ route('special.user.profile') }}">
							{{ _q('lara-front::user.menu.profile') }}
						</a>
					</li>
					@if(Auth::user()->hasPanelAccess())
						<li>
							<a class="menu-sub-link" href="/admin" target="_blank">
								{{ _q('lara-front::user.menu.dashboard') }}
							</a>
						</li>
					@endif
					<li>
						<a href="{{ route('logout') }}"
						   class="menu-sub-link"
						   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							{{ _q('lara-front::user.menu.logouttext') }}
						</a>
					</li>

				</ul>
			</div>
		</li>
	</ul>

@else
	<ul>
		<li>
			<a href="{{ route('login', ['returnto' => $returnto]) }}" class="btn btn-ghost">
				<x-heroicon-o-user-circle class="w-5 h-5 "/>
			</a>
		</li>
	</ul>

@endif