{{ Vite::useBuildDirectory('assets/themes/base') }}
@vite(['laracms/themes/base/_assets/js/app.js'])

{!! Theme::js('vendor/jscookie/js.cookie.js') !!}

<script>
	let dropdownParents = document.querySelectorAll('[data-bs-toggle="dropdown"]');
	dropdownParents.forEach(el => {
		el.addEventListener('click', (e) => {
			let width = document.body.clientWidth;
			if(width > 992) {
				let dropdownDirectUrl = e.target.href;
				if(dropdownDirectUrl && dropdownDirectUrl != '#') {
					location.href = dropdownDirectUrl;
				}
			}
		});
	});
</script>
