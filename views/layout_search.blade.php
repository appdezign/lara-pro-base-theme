<!DOCTYPE html>
<html lang="{{ $language }}" class="notranslate" translate="no">

<head>

	<meta name="google" content="notranslate"/>

	@yield('head-before')

	@include('_main.html_header')

	@yield('head-after')

</head>

<body class="lara-{{ $entity->getResourceSlug() }} lara-{{ $activeroute->getMethod() }} ">

<main class="page-wrapper">

	@include('_partials.header.'.$data->layout->header)

	@yield('content')

</main>

@include('_partials.footer.'.$data->layout->footer)

@yield('scripts-before')

@include('_main.html_footer')

@yield('scripts-after')

@include('_scripts.cookieconsent')

</body>
</html>

