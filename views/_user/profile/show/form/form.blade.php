@php
	$req = ['data-error' => _q('lara-front::default.form.required'), 'required' => ''];
	$emailreq = ['data-error' => _q('lara-front::default.form.email_is_invalid'), 'required' => ''];
@endphp

<div class="text-end pb-6">
	* = {{ _q('lara-front::default.form.required') }}
</div>

@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif



{{ html()->modelForm($data->object,
			'PATCH',
			route('special.user.saveprofile'))
			->id('lara-default-edit-form')
			->attributes(['accept-charset' => 'UTF-8'])
			->class('needs-validation')
			->novalidate()
			->open() }}

@if(config('lara.httpcache_on_forms'))
	<hx:include src="/csrf/input"></hx:include>
@else
	@csrf
@endif
<div class="row">

	<fieldset class="fieldset w-full my-2">
		<legend class="fieldset-legend">
			{{ _q('lara-admin::users.column.email') }}
		</legend>
		<input type="email" name="email" id="email" class="input w-full" value="{{ $data->object->email }}" disabled />
	</fieldset>

	<fieldset class="fieldset w-full my-2">
		<legend class="fieldset-legend">
			{{ _q('lara-admin::users.column.name') }}
		</legend>
		{{ html()->text('name', null)
			->class('input w-full')
			->required() }}
	</fieldset>

	<fieldset class="fieldset w-full my-2">
		<legend class="fieldset-legend">
			{{ _q('lara-admin::users.column.firstname') }}
		</legend>
		{{ html()->text('firstname', null)
			->class('input w-full')
			->required() }}
	</fieldset>

	<fieldset class="fieldset w-full my-2">
		<legend class="fieldset-legend">
			{{ _q('lara-admin::users.column.middlename') }}
		</legend>
		{{ html()->text('middlename', null)
			->class('input w-full')
			->required() }}
	</fieldset>

	<fieldset class="fieldset w-full my-2">
		<legend class="fieldset-legend">
			{{ _q('lara-admin::users.column.lastname') }}
		</legend>
		{{ html()->text('lastname', null)
			->class('input w-full')
			->required() }}
	</fieldset>

	<fieldset class="fieldset w-full my-2">
		<legend class="fieldset-legend">
			{{ _q('lara-admin::users.column.new_password') }}
		</legend>
		{{ html()->password('_password')->class('input w-full')->attributes(['autocomplete' => 'new-password']) }}
	</fieldset>

</div>

{{ html()->hidden('_ipaddress', Request::ip()) }}

<div class="row mt-24">
	<div class="col-md-4"></div>
	<div class="col-md-8">
		<button id="{{ $entity->getResourceSlug() }}-submit-button" type="submit"
		        class="btn btn-lg btn-primary pull-right">{{ _q('lara-app::'.$entity->getResourceSlug().'.button.submit') }}</button>
	</div>
</div>

{{ html()->form()->close() }}
