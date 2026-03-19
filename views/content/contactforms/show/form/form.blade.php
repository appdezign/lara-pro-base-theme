@section('head-after')
	<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

{{ html()->form('POST', null)
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

<div class="grid grid-cols-12">
	<div class="col-span-12 text-end">
		* = {{ _q('lara-front::default.form.required') }}
	</div>
</div>

<x-honeypot/>

<div class="row">

	@foreach($entity->getCustomColumns() as $cvar)

		@if($cvar->rule_state == 'enabled')

			<div class="col-span-12">

				<fieldset class="fieldset w-full text-sm">
					<legend class="fieldset-legend">
						{{ html()->label(_q('lara-app::'.$entity->getResourceSlug().'.column.' .$cvar->field_name) .':', $cvar->field_name)->class('form-label fs-base') }}
						@if($cvar->is_required)
							<span class="field-required color-dark">*</span>
						@endif
					</legend>

					@if($cvar->field_type == 'string')
						{{ html()->text($cvar->field_name, null)
							->class('input w-full validator')
							->if($cvar->is_required, function ($el) {
								return $el->required();
							}) }}
						<div class="validator-hint mt-0">{{ _q('lara-front::default.form.error_required') }}</div>
					@endif

					@if($cvar->field_type == 'email')
						{{ html()->email($cvar->field_name, null)
							->class('input w-full validator')
							->if($cvar->is_required, function ($el) {
								return $el->required();
							}) }}
						<div class="validator-hint mt-0">{{ _q('lara-front::default.form.error_email_is_invalid') }}</div>
					@endif

					@if($cvar->field_type == 'textarea')
						{{ html()->textarea($cvar->field_name, null)
								->class('textarea w-full validator')
								->rows(4)
								->if($cvar->is_required, function ($el) {
									return $el->required();
								}) }}
						<div class="validator-hint mt-0">{{ _q('lara-front::default.form.error_required') }}</div>
					@endif

					@if($cvar->field_type == 'integer')
						{{ html()->input('number', $cvar->field_name, null)
							->class('input w-full validator')
							->attributes(['step' => '1'])
							->if($cvar->is_required, function ($el) {
								return $el->required();
							}) }}
						<div class="validator-hint mt-0">{{ _q('lara-front::default.form.error_required') }}</div>
					@endif

					@if($cvar->field_type == 'date')
						<div id="dtp-{{ $cvar->field_name }}">
							{{ html()->input('date', $cvar->field_name, null)
								->class('input w-full validator')
								->if($cvar->is_required, function ($el) {
									return $el->required();
								}) }}
						</div>
						<div class="validator-hint mt-0">{{ _q('lara-front::default.form.error_required') }}</div>
					@endif

					@if($cvar->field_type == 'toggle')
						{{ html()->hidden($cvar->field_name, 0) }}
						{{ html()->checkbox($cvar->field_name, null, 1)
							->class('toggle toggle-primary')
							->if($cvar->is_required, function ($el) {
								return $el->required();
							}) }}
						<div class="validator-hint mt-0 ms-8 pt-6">{{ _q('lara-front::default.form.error_required') }}</div>

					@endif

					@if($cvar->field_type == 'select')
						{{ html()->select($cvar->field_name, $cvar->field_options, null)
								->class('select w-full validator')
								->if($cvar->is_required, function ($el) {
									return $el->required();
								}) }}
						<div class="validator-hint mt-0">{{ _q('lara-front::default.form.error_required') }}</div>
					@endif

					@if($cvar->field_type == 'radio')
						<div class="flex gap-1 -ms-3">
							@foreach($cvar->field_options as $fldkey => $fldval)
								{{ html()->radio($cvar->field_name, null, $fldkey)
									->id($cvar->field_name.'_' . $loop->index)
									->class('radio radio-primary ms-3')
									->if($cvar->is_required, function ($el) {
										return $el->required();
									}) }}
								{{ $fldval }}
							@endforeach
						</div>
					@endif

				</fieldset>
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

		<div class="col-span-12 mt-6 p-4 bg-secondary">

			<div class="g-recaptcha"
			     data-sitekey="{{ config('lara.google_recaptcha_site_key') }}"
			     data-callback="verifyRecaptchaCallback"
			     data-expired-callback="expiredRecaptchaCallback"></div>

			<!-- extra field for triggering the validator -->
			<input class="input hidden" data-recaptcha="true" required="" data-error="">
			<div class="validator-hint mt-0">
				{{ _q('lara-front::default.form.error_recaptcha_not_checked') }}
			</div>

		</div>

	@endif

	{{ html()->hidden('_ipaddress', Request::ip()) }}

	<div class="col-span-12 mt-6 text-end">
		<button id="{{ $entity->getResourceSlug() }}-submit-button"
		        type="submit"
		        class="btn btn-lg btn-primary">
			{{ _q('lara-app::'.$entity->getResourceSlug().'.button.submit') }}
		</button>
	</div>
</div>

{{ html()->form()->close() }}

<!-- Ajax response -->
<div id="{{ $entity->getResourceSlug() }}-response" class="ajax-response d-none text-center"></div>

@section('scripts-after')

	@parent

	{!! Theme::js('vendor/axios/axios.min.js') !!}

	<script>
		(function () {
			'use strict'

			window.verifyRecaptchaCallback = function (response) {
				const dataReCaptcha = document.querySelector('input[data-recaptcha]');
				dataReCaptcha.value = response;
			}
			window.expiredRecaptchaCallback = function () {
				const dataReCaptcha = document.querySelector('input[data-recaptcha]');
				dataReCaptcha.value = "";
			}

			const form = document.getElementById('{{ $entity->getResourceSlug() }}-form');
			const ajaxResponse = document.getElementById('{{ $entity->getResourceSlug() }}-response');
			const submit = document.getElementById('{{ $entity->getResourceSlug() }}-submit-button');
			const submitText = submit.innerHTML;

			form.addEventListener('submit', function (event) {
				if (!form.checkValidity()) {
					event.preventDefault()
					event.stopPropagation()
				} else {
					event.preventDefault()
					let bodyFormData = new FormData(form);
					@if(config('app.env') == 'production' && config('lara.google_recaptcha_site_key'))
					bodyFormData.append('rcresponse', grecaptcha.getResponse());
					@endif
						submit.innerHTML = '<i class="fas fa-spinner fa-spin"></i>'

					axios({
						method: "post",
						url: "{{ route('ajax.'.$entity->getResourceSlug().'.process') }}",
						data: bodyFormData,
						headers: {"Content-Type": "multipart/form-data"},
					}).then(function (response) {
						//handle success
						if (response.data.sendstatus == 1) {
							// prepare resonse block
							ajaxResponse.style.paddingTop = "1.5rem";
							ajaxResponse.style.paddingTop = "1.5rem";
							ajaxResponse.style.marginBottom = "20rem";
							ajaxResponse.style.color = "#6366f1";
							ajaxResponse.style.backgroundColor = "#f3f6ff";
							ajaxResponse.style.minHeight = "80px";
							ajaxResponse.innerHTML = response.data.message;
							// hide form
							form.classList.add('fade');
							// show response
							setTimeout(() => {
								form.classList.add('d-none');
								ajaxResponse.classList.remove('d-none');
							}, 400);
						} else {
							ajaxResponse.style.color = "#C8004B";
							ajaxResponse.innerHTML = response.data.message;
							submit.innerHTML = submitText;
						}
					}).catch(function (error) {
						//handle error
						alert(error.response.data.message);
						submit.innerHTML = submitText;
					});
				}
				form.classList.add('was-validated')
			}, false)
		})();
	</script>

@endsection
