<meta charset="utf-8">

<title>Lara {{ $laraversion->major }}</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Favicon and Touch Icons -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ Theme::url('favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ Theme::url('favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ Theme::url('favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ Theme::url('favicon/site.webmanifest') }}">
<link rel="shortcut icon" href="{{ Theme::url('favicon/favicon.ico') }}">
<meta name="msapplication-TileColor" content="#080032">
<meta name="msapplication-config" content="{{ Theme::url('favicon/browserconfig.xml') }}">
<meta name="theme-color" content="#ffffff">

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

<!-- Scripts -->
{{ Vite::useBuildDirectory('assets/themes/base') }}
@vite(['laracms/themes/base/_assets/scss/app.scss'])


