<!DOCTYPE html>
<html>
<head>

	@yield('head-before')

	@include('_main.html_header_auth')

	@yield('head-after')

</head>

<body class="front-login-page" style="background-image: url({!! Theme::url('images/login-bg.jpg') !!});">

<div class="front-login-page-gradient-bg"></div>

<main class="page-wrapper">
	@yield('content')
</main>

@yield('scripts-before')

@include('_main.html_footer_auth')

@yield('scripts-after')

</body>
</html>
