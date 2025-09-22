<!DOCTYPE html>
<html lang="{{ $language }}" class="notranslate" translate="no">

<head>

	<meta name="google" content="notranslate"/>

	@yield('head-before')

	@include('_main.html_header')

	@yield('head-after')

</head>

<body class="lara-{{ $entity->getResourceSlug() }} lara-{{ $activeroute->getMethod() }} lara-{{ $data->params->getVType() }}">

@if(isset($firstpageload) && $firstpageload)
	<!-- Page loading spinner -->
	<div class="page-loading active">
		<div class="page-loading-inner">
			<div class="page-spinner"></div>
			<span>Loading...</span>
		</div>
	</div>
@endif

<main class="page-wrapper">

	@include('_partials.header.'.$data->layout->header)

	@includeWhen($data->layout->hero, '_partials.hero.'.$data->layout->hero)
	@includeWhen($data->layout->pagetitle, '_partials.pagetitle.'.$data->layout->pagetitle)
	@includeWhen(isset($data->page), '_partials.pagehero.pagehero')
	@include('_partials.misc.breadcrumb')

	@yield('content')

	@includeWhen($data->layout->share, '_partials.sharing.'.$data->layout->share)
	@includeWhen($data->layout->cta, '_partials.cta.'.$data->layout->cta)

</main>

@include('_partials.footer.'.$data->layout->footer)

@yield('scripts-before')

@include('_main.html_footer')

@yield('scripts-after')

@include('_scripts.cookieconsent')

</body>
</html>

