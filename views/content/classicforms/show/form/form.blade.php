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


{{ html()->form('POST', route('form.'.$entity->getResourceSlug() . '.' . $activeroute->getMenuId() . '.process'))
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

<div class="row">
	<div class="col-12 text-end">
		* = {{ _q('lara-front::default.form.required') }}
	</div>
</div>

<x-honeypot/>

<div class="row">

	@foreach($entity->getCustomColumns() as $cvar)

		@if($cvar->rule_state == 'enabled')

			<div class="col-12 mt-24">
				{{ html()->label(_q('lara-app::'.$entity->getResourceSlug().'.column.' .$cvar->field_name) .':', $cvar->field_name)->class('form-label fs-base') }}

				@if($cvar->is_required)
					<span class="field-required color-dark">*</span>
				@endif

				@if($cvar->field_type == 'string')
					{{ html()->text($cvar->field_name, null)
						->class('form-control')
						->if($cvar->is_required, function ($el) {
							return $el->required();
						}) }}
					<div class="invalid-feedback">{{ _q('lara-front::default.form.error_required') }}</div>
				@endif

				@if($cvar->field_type == 'email')
					{{ html()->email($cvar->field_name, null)
						->class('form-control')
						->if($cvar->is_required, function ($el) {
							return $el->required();
						}) }}
					<div class="invalid-feedback">{{ _q('lara-front::default.form.error_email_is_invalid') }}</div>
				@endif

				@if($cvar->field_type == 'textarea')
					{{ html()->textarea($cvar->field_name, null)
							->class('form-control')
							->rows(4)
							->if($cvar->is_required, function ($el) {
								return $el->required();
							}) }}
					<div class="invalid-feedback">{{ _q('lara-front::default.form.error_required') }}</div>
				@endif

				@if($cvar->field_type == 'integer')
					{{ html()->input('number', $cvar->field_name, null)
						->class('form-control')
						->attributes(['step' => '1'])
						->if($cvar->is_required, function ($el) {
							return $el->required();
						}) }}
					<div class="invalid-feedback">{{ _q('lara-front::default.form.error_required') }}</div>
				@endif

				@if($cvar->field_type == 'date')
					<div id="dtp-{{ $cvar->field_name }}" class="date-flat-pickr">
						{{ html()->text($cvar->field_name, null)
							->class('form-control')
							->data('input')
							->if($cvar->is_required, function ($el) {
								return $el->required();
							}) }}
						<a class="flat-pickr-button" title="toggle" data-toggle>
							<i class="fal fa-calendar-alt"></i>
						</a>
					</div>
					<div class="invalid-feedback">{{ _q('lara-front::default.form.error_required') }}</div>
				@endif

				@if($cvar->field_type == 'toggle')
					{{ html()->hidden($cvar->field_name, 0) }}
					<div class="form-check">
						{{ html()->checkbox($cvar->field_name, null, 1)
							->class('form-check-input')
							->if($cvar->is_required, function ($el) {
								return $el->required();
							}) }}
						<div class="invalid-feedback ms-8 pt-6">{{ _q('lara-front::default.form.error_required') }}</div>
					</div>

				@endif

				@if($cvar->field_type == 'select')
					{{ html()->select($cvar->field_name, array_combine($cvar->field_options, $cvar->field_options), null)
							->class('form-select form-select-sm')
							->data('control', 'select2')->data('hide-search', 'true')
							->if($cvar->is_required, function ($el) {
								return $el->required();
							}) }}
					<div class="invalid-feedback">{{ _q('lara-front::default.form.error_required') }}</div>
				@endif

				@if($cvar->field_type == 'radio')
					<div class="d-flex">
						@foreach($cvar->field_options as $fldkey => $fldval)
							<label class="radio-inline">
								{{ html()->radio($cvar->field_name, null, $fldval)
									->id($cvar->field_name.'_' . $loop->index)
									->class('form-check-input')
									->if($cvar->is_required, function ($el) {
										return $el->required();
									}) }}
								{{ $fldval }}
							</label>
						@endforeach
					</div>
				@endif


			</div>

		@else

			@if($cvar->field_type == 'boolean')
				{{ html()->hidden($cvar->field_name, 0) }}
			@else
				{{ html()->hidden($cvar->field_name, null) }}
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
			@if ($cvar->field_type == 'date')
			flatpickr("#dtp-{{  $cvar->field_name }}", {
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
