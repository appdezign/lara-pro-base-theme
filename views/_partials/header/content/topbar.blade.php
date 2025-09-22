<div class="d-flex justify-content-between align-items-center">

	<!-- Logo -->
	<a href="/{{ $language }}/" class="navbar-brand py-24">
		{!! Theme::img('images/lara8-logo.svg', 'Silicon', '', ['width' => '47']) !!}
		Lara 8
	</a>

	<div class="ms-auto me-16">
		<a href="javascript:void(0)" class="js-search-btn nav-link">
			<i class="far fa-search"></i>
		</a>
	</div>

	<!-- Topmenu -->
	@widget('MenuLevelOneWidget', ['mnu' => 'top'])

	@if(config('lara.auth.has_front_auth'))
		<hx:include src="/loginwidget/menu?returnto={{ url()->current() }}"></hx:include>
	@endif

	{{ html()->form('POST', route('logout'))
		->id('logout-form')
		->attributes(['accept-charset' => 'UTF-8'])
		->open() }}
	<hx:include src="/csrf/input"></hx:include>
	{{ html()->hidden('redirect', 'special.home.show') }}
	{{ html()->form()->close() }}

</div>