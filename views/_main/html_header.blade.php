<meta charset="utf-8">

@include('_partials._seo.seo_title')

<meta name="viewport" content="width=device-width, initial-scale=1.0">

{!! Theme::js('vendor/hinclude/hinclude.js') !!}

@include('_partials._seo.language_versions')

@include('_partials._seo.seo_meta_tags')

@include('_partials._seo.og_meta_tags')

@include('_partials._google.ga4')

<!-- Favicon and Touch Icons -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ Theme::url('favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ Theme::url('favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ Theme::url('favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ Theme::url('favicon/site.webmanifest') }}">
<link rel="shortcut icon" href="{{ Theme::url('favicon/favicon.ico') }}">
<meta name="msapplication-TileColor" content="#080032">
<meta name="msapplication-config" content="{{ Theme::url('favicon/browserconfig.xml') }}">
<meta name="theme-color" content="#ffffff">

{{ Vite::useBuildDirectory('assets/themes/base') }}
@vite(['laracms/themes/base/_assets/scss/app.scss'])


