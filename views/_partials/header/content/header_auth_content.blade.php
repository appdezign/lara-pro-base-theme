<!-- Logo -->
<a href="/{{ $language }}/" class="navbar-brand pe-16">
	{!! Theme::img('images/lara10-logo.svg', 'Lara CMS', '', ['width' => '47']) !!}
	Lara 10
</a>

<!-- Main Menu -->
<div id="navbarNav" class="offcanvas offcanvas-end">
	<div class="offcanvas-header border-bottom">
		<h5 class="offcanvas-title">Menu</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">
		<ul class="navbar-nav me-auto mb-8 mb-lg-0">

			@widget('menuWidget', ['mnu' => 'main', 'showroot' => false, 'grid' => $data->grid])

		</ul>
	</div>
</div>

<div class="ms-auto me-16">
	<a href="javascript:void(0)" class="js-search-btn nav-link">
		<i class="far fa-search"></i>
	</a>
</div>

@if(config('lara.auth.has_front_auth'))
	<hx:include src="/loginwidget/menu?returnto={{ url()->current() }}"></hx:include>
@endif

<button type="button" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>

{{ html()->form('POST', route('logout'))
	->id('logout-form')
	->attributes(['accept-charset' => 'UTF-8'])
	->open() }}
<hx:include src="/csrf/input"></hx:include>
{{ html()->hidden('redirect', 'special.home.show') }}
{{ html()->form()->close() }}