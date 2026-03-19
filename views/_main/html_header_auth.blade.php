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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

<!-- Scripts -->
{{ Vite::useBuildDirectory('assets/themes/' . config('theme.active')) }}
@vite(['laracms/themes/' . config('theme.active') . '/_assets/css/app.css'])



