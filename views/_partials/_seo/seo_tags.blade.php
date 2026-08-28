{{-- SEO head tags — <x-filarank::tags :model="$post" /> --}}

@if ($data->seo->config['render']['title_tag'])
	<title>{{ $data->seo->fullTitle }}</title>
@endif

@if (filled($data->seo->description))
	<meta name="description" content="{{ $data->seo->description }}">
@endif

@if (filled($data->seo->robots))
	<meta name="robots" content="{{ $data->seo->robots }}">
@endif

@if ($data->seo->config['render']['canonical'] && filled($data->seo->url))
	<link rel="canonical" href="{{ $data->seo->url }}">
@endif

@if ($data->seo->config['render']['open_graph'])
	<meta property="og:type" content="{{ strtolower($data->seo->config['render']['json_ld_type'] ?? 'article') === 'article' ? 'article' : 'website' }}">
	<meta property="og:title" content="{{ $data->seo->title }}">
	<meta property="og:site_name" content="{{ $data->seo->config['site']['name'] }}">
	@if (filled($data->seo->description))
		<meta property="og:description" content="{{ $data->seo->description }}">
	@endif
	@if (filled($data->seo->url))
		<meta property="og:url" content="{{ $data->seo->url }}">
	@endif
	@if (filled($data->seo->image))
		<meta property="og:image" content="{!! $data->seo->image !!}">
	@endif
@endif

@if ($data->seo->config['render']['twitter_cards'])
	<meta name="twitter:card" content="{{ filled($data->seo->image) ? 'summary_large_image' : 'summary' }}">
	<meta name="twitter:title" content="{{ $data->seo->title }}">
	@if (filled($data->seo->description))
		<meta name="twitter:description" content="{{ $data->seo->description }}">
	@endif
	@if (filled($data->seo->image))
		<meta name="twitter:image" content="{!! $data->seo->image !!}">
	@endif
	@if (filled($data->seo->config['site']['twitter_handle']))
		<meta name="twitter:site" content="{{ $data->seo->config['site']['twitter_handle'] }}">
	@endif
@endif

@if ($data->seo->jsonLd !== null)
	<script type="application/ld+json">{!! json_encode($data->seo->jsonLd, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
@endif
