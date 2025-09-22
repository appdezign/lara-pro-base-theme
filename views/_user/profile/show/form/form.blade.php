@php
	$req = ['data-error' => _q('lara-front::default.form.required'), 'required' => ''];
	$emailreq = ['data-error' => _q('lara-front::default.form.email_is_invalid'), 'required' => ''];
@endphp

<div class="text-right p-b-20">
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

	<div class="col-12 mt-24">
		<div class="row">
			<div class="col-6 col-md-4">
				{{ html()->label(_q('lara-' . $entity->getModule().'::'.$entity->getResourceSlug().'.column.username').':', 'username') }}
			</div>
			<div class="col-6 col-md-8">
				{{ $data->object->username }}
			</div>
		</div>
	</div>

	<div class="col-12 mt-24">
		<div class="row">
			<div class="col-6 col-md-4">
				{{ html()->label(_q('lara-' . $entity->getModule().'::'.$entity->getResourceSlug().'.column.email').':', 'email') }}
			</div>
			<div class="col-6 col-md-8">
				{{ $data->object->email }}
			</div>
		</div>
	</div>

	<div class="col-12 mt-24">
		<div class="row">
			<div class="col-md-4">
				{{ html()->label(_q('lara-' . $entity->getModule().'::'.$entity->getResourceSlug().'.column.firstname').':', 'firstname') }}
			</div>
			<div class="col-md-8">
				{{ html()->text('firstname', null)->class('form-control') }}
			</div>
		</div>
	</div>
	<div class="col-12 mt-24">
		<div class="row">
			<div class="col-md-4">
				{{ html()->label(_q('lara-' . $entity->getModule().'::'.$entity->getResourceSlug().'.column.middlename').':', 'middlename') }}
			</div>
			<div class="col-md-8">
				{{ html()->text('middlename', null)->class('form-control') }}
			</div>
		</div>
	</div>
	<div class="col-12 mt-24">
		<div class="row">
			<div class="col-md-4">
				{{ html()->label(_q('lara-' . $entity->getModule().'::'.$entity->getResourceSlug().'.column.lastname').':', 'lastname') }}
			</div>
			<div class="col-md-8">
				{{ html()->text('lastname', null)->class('form-control') }}
			</div>
		</div>
	</div>
	<div class="col-12 mt-24">
		<div class="row">
			<div class="col-md-4">
				{{ html()->label(_q('lara-' . $entity->getModule().'::'.$entity->getResourceSlug().'.column.name').':', 'name') }}
			</div>
			<div class="col-md-8">
				{{ html()->text('name', null)->class('form-control') }}
			</div>
		</div>
	</div>
	<div class="col-12 mt-24">
		<div class="row">
			<div class="col-md-4">
				{{ html()->label(_q('lara-' . $entity->getModule().'::'.$entity->getResourceSlug().'.column.new_password').':', '_password') }}
			</div>
			<div class="col-md-8">
				{{ html()->password('_password')->class('form-control')->attributes(['autocomplete' => 'new-password']) }}
			</div>
		</div>
	</div>
</div>

@include('_user.profile.show.form.fields.fields')

{{ html()->hidden('_ipaddress', Request::ip()) }}

<div class="row mt-24">
	<div class="col-md-4"></div>
	<div class="col-md-8">
		<button id="{{ $entity->getResourceSlug() }}-submit-button" type="submit"
		        class="btn btn-lg btn-primary pull-right">{{ _q('lara-app::'.$entity->getResourceSlug().'.button.submit') }}</button>
	</div>
</div>

{{ html()->form()->close() }}
