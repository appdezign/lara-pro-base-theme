@section('head-after')
	<script src='https://www.google.com/recaptcha/api.js'></script>
	{!! Theme::css('vendor/flatpickr/flatpickr.min.css') !!}
@endsection

@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif


{{ html()->form('POST', route('form.'.$entity->getResourceSlug().'.process'))
		->id($entity->getResourceSlug() . '-form')
		->attributes(['accept-charset' => 'UTF-8'])
		->class('lara-system-form needs-validation')
		->novalidate()
		->open() }}

@if(config('lara.httpcache_on_forms'))
	<hx:include src="/csrf/input"></hx:include>
@else
	@csrf
@endif

<x-honeypot/>

<div class="row">

	@foreach($entity->getCustomColumns() as $cvar)
		@if($cvar->fieldstate == 'enabled')

			<div class="col-12 mt-24">
				{{ html()->label(_q('lara-app::'.$entity->getResourceSlug().'.column.' .$cvar->fieldname) .':', $cvar->fieldname)->class('form-label fs-base') }}

				@if($cvar->fieldtype == 'string')
					{{ html()->text($cvar->fieldname, null)
						->class('form-control')
						->if($cvar->required, function ($el) {
							return $el->required();
						}) }}
					<div class="invalid-feedback">{{ _q('lara-front::default.form.error_required') }}</div>
				@endif

				@if($cvar->fieldtype == 'email')
					{{ html()->email($cvar->fieldname, null)
						->class('form-control')
						->if($cvar->required, function ($el) {
							return $el->required();
						}) }}
					<div class="invalid-feedback">{{ _q('lara-front::default.form.error_email_is_invalid') }}</div>
				@endif

				@if($cvar->fieldtype == 'text')
					{{ html()->textarea($cvar->fieldname, null)
							->class('form-control')
							->rows(4)
							->if($cvar->required, function ($el) {
								return $el->required();
							}) }}
					<div class="invalid-feedback">{{ _q('lara-front::default.form.error_required') }}</div>
				@endif

				@if($cvar->fieldtype == 'integer')
					{{ html()->input('number', $cvar->fieldname, null)
						->class('form-control')
						->attributes(['step' => '1'])
						->if($cvar->required, function ($el) {
							return $el->required();
						}) }}
					<div class="invalid-feedback">{{ _q('lara-front::default.form.error_required') }}</div>
				@endif

				@if($cvar->fieldtype == 'date')
					<div id="dtp-{{ $cvar->fieldname }}" class="date-flat-pickr">
						{{ html()->text($cvar->fieldname, null)
							->class('form-control')
							->data('input')
							->if($cvar->required, function ($el) {
								return $el->required();
							}) }}
						<a class="flat-pickr-button" title="toggle" data-toggle>
							<i class="fal fa-calendar-alt"></i>
						</a>
					</div>
					<div class="invalid-feedback">{{ _q('lara-front::default.form.error_required') }}</div>
				@endif

				@if($cvar->fieldtype == 'boolean')
					{{ html()->hidden($cvar->fieldname, 0) }}
					<div class="form-check">
						{{ html()->checkbox($cvar->fieldname, null, 1)
							->class('form-check-input')
							->if($cvar->required, function ($el) {
								return $el->required();
							}) }}
						<div class="invalid-feedback ms-8 pt-6">{{ _q('lara-front::default.form.error_required') }}</div>
					</div>

				@endif

				@if($cvar->fieldtype == 'selectone')
					{{ html()->select($cvar->fieldname, $cvar->fieldvalues, null)
							->class('form-select form-select-sm')
							->data('control', 'select2')->data('hide-search', 'true')
							->if($cvar->required, function ($el) {
								return $el->required();
							}) }}
					<div class="invalid-feedback">{{ _q('lara-front::default.form.error_required') }}</div>
				@endif

				@if($cvar->fieldtype == 'radio')
					<div class="d-flex">
						@foreach($cvar->fieldvalues as $fldkey => $fldval)
							<label class="radio-inline">
								{{ html()->radio($cvar->fieldname, null, $fldkey)
									->id($cvar->fieldname.'_' . $loop->index)
									->class('form-check-input')
									->if($cvar->required, function ($el) {
										return $el->required();
									}) }}
								{{ $fldval }}
							</label>
						@endforeach
					</div>
				@endif

				@if($cvar->fieldtype == 'yesno')
					<div class="d-flex">
						<label class="radio-inline">
							{{ html()->radio($cvar->fieldname, null, 1)
								->id($cvar->fieldname.'_1')
								->class('form-check-input')
								->if($cvar->required, function ($el) {
									return $el->required();
								}) }}
							{{ _q('lara-admin::default.value.yes') }}
						</label>
						<label class="radio-inline">
							{{ html()->radio($cvar->fieldname, null, 0)
								->id($cvar->fieldname.'_0')
								->class('form-check-input')
								->if($cvar->required, function ($el) {
									return $el->required();
								}) }}
							{{ _q('lara-admin::default.value.no') }}
						</label>
					</div>
				@endif

			</div>

		@else

			@if($cvar->fieldtype == 'boolean' || $cvar->fieldtype == 'yesno')
				{{ html()->hidden($cvar->fieldname, 0) }}
			@else
				{{ html()->hidden($cvar->fieldname, null) }}
			@endif

		@endif
	@endforeach

	@if(config('app.env') == 'production' && config('lara.google_recaptcha_site_key'))

		<div class="col-12 mt-24 p-16 bg-secondary">

			<div class="g-recaptcha"
			     data-sitekey="{{ config('lara.google_recaptcha_site_key') }}"
			     data-callback="verifyRecaptchaCallback"
			     data-expired-callback="expiredRecaptchaCallback"></div>

			<!-- extra field for triggering the validator -->
			<input class="form-control d-none" data-recaptcha="true" required="" data-error="">
			<div class="invalid-feedback">
				{{ _q('lara-front::default.form.error_recaptcha_not_checked') }}
			</div>

		</div>

	@endif

	{{ html()->hidden('_ipaddress', Request::ip()) }}

	<div class="col-12 mt-24">
		<button id="{{ $entity->getResourceSlug() }}-submit-button"
		        type="submit"
		        class="btn btn-lg btn-info float-end">
			{{ _q('lara-app::'.$entity->getResourceSlug().'.button.submit') }}
		</button>
	</div>
</div>

{{ html()->form()->close() }}

@section('scripts-after')

	@parent

	{!! Theme::js('vendor/flatpickr/flatpickr.min.js') !!}
	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded", function () {
			// datetimepickers for fields
			@foreach ($entity->getCustomColumns() as $cvar)
			@if ($cvar->fieldtype == 'date')
			flatpickr("#dtp-{{  $cvar->fieldname }}", {
				dateFormat: "Y-m-d",
				enableTime: false,
				wrap: true,
			});
			@endif
			@endforeach
		});
	</script>

	<script>
		(function () {
			window.verifyRecaptchaCallback = function (response) {
				const dataReCaptcha = document.querySelector('input[data-recaptcha]');
				dataReCaptcha.value = response;
			}
			window.expiredRecaptchaCallback = function () {
				const dataReCaptcha = document.querySelector('input[data-recaptcha]');
				dataReCaptcha.value = "";
			}
		})();
	</script>

@endsection
