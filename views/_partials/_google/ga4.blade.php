@if(isset($subsite))
	@if(!empty($subsite->ga4tagid))

	<!-- Google tag (GA4) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id={{ $subsite->ga4tagid }}"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', '{{ $subsite->ga4tagid }}', { 'anonymize_ip': true });
	</script>

	@endif
@else
	@if(property_exists($settngz, 'ga4_id') && strlen($settngz->ga4_id) > 3)

		<!-- Google tag (GA4) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id={{ $settngz->ga4_id }}"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', '{{ $settngz->ga4_id }}', { 'anonymize_ip': true });
		</script>

	@endif
@endif