<div class="navbar-start">
	<a href="/" class="flex items-center">
		{!! Theme::img('images/company-logo.png', 'Lara CMS', 'mr-2', ['width' => '47']) !!}
		<span class="text-xl font-medium">Lara 10</span>
	</a>
</div>
<div class="navbar-center hidden lg:flex">

	<ul class="menu menu-horizontal">

		@widget('menuWidget', ['mnu' => 'main', 'showroot' => false, 'grid' => $data->grid])

	</ul>

</div>
<div class="navbar-end ">

	<a href="javascript:void(0)" class="js-search-btn px-3 pt-[1.125rem] pb-[0.875rem]">
		<x-heroicon-o-magnifying-glass class="w-6 h-6 text-gray-500"/>
	</a>

	@if(config('lara.auth.has_front_auth'))
		<hx:include src="/loginwidget/menu?returnto={{ url()->current() }}"></hx:include>
	@endif

	<!-- Mobile Menu Toggle -->
	<div class="flex-none lg:hidden py-2">
		<label for="lara-mobile-drawer" aria-label="open sidebar" class="block p-2">
			<x-heroicon-o-bars-3 class="h-6 w-6"/>
		</label>
	</div>
</div>

@if(config('lara.auth.has_front_auth'))
	{{ html()->form('POST', route('logout'))
		->id('logout-form')
		->attributes(['accept-charset' => 'UTF-8'])
		->open() }}
	<hx:include src="/csrf/input"></hx:include>
	{{ html()->hidden('redirect', 'special.home.show') }}
	{{ html()->form()->close() }}
@endif