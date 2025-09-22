<!-- Navbar -->
<header class="header navbar navbar-expand-lg bg-light d-block fixed-top">
	<div class="container px-16">

		@if(config('lara.auth.has_front_auth'))
			@include('_partials.header.content.header_auth_content')
		@else
			@include('_partials.header.content.header_content')
		@endif

	</div>

	@include('_partials.header.content.search')

</header>