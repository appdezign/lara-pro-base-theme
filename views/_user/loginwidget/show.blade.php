@if($type == 'menu')

	@include('_user.loginwidget._partials.menu')

@elseif($type == 'link')

	@include('_user.loginwidget._partials.link')

@elseif($type == 'user')

	@if (Auth::check())
		{{ Auth::user()->name }}
	@endif

@endif
