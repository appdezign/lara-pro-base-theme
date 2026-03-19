@extends('layout_auth')

@section('content')
	<div class="flex h-full justify-center items-center">
		<div class="card bg-white shadow-sm" style="width: 480px; max-width: 100%;">

			<div class="card-body">

				<h1 class="h2 card-title mb-2">
					{{ ucfirst(_q('lara-front::auth.headers.register')) }}
				</h1>

				<div class="border-b-1 border-slate-200 h-0 my-2"></div>

				@if ($errors->any())
					<div class="alert alert-danger">
						<ul class="">
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@else
					@include('flash::message')
				@endif

				<form method="POST" action="{{ route('register') }}" autocomplete="off">

					@csrf

					<fieldset class="fieldset w-full my-2">
						<div class="grid grid-cols-12 gap-4">
							<div class="col-span-12 md:col-span-4">
								<legend class="fieldset-legend">{{ _q('lara-admin::users.column.email') }}</legend>
							</div>
							<div class="col-span-12 md:col-span-8">
								<input type="email" name="email" id="email" class="input w-full" value="{{ old('email') }}" autocomplete="new-email" required />
							</div>
						</div>
					</fieldset>

					<fieldset class="fieldset w-full my-2">
						<div class="grid grid-cols-12 gap-4">
							<div class="col-span-12 md:col-span-4">
								<legend class="fieldset-legend">{{ _q('lara-admin::users.column.firstname') }}</legend>
							</div>
							<div class="col-span-12 md:col-span-8">
								<input type="text" name="firstname" id="firstname" class="input w-full" value="{{ old('firstname') }}" required/>
							</div>
						</div>
					</fieldset>

					<fieldset class="fieldset w-full my-2">
						<div class="grid grid-cols-12 gap-4">
							<div class="col-span-12 md:col-span-4">
								<legend class="fieldset-legend">{{ _q('lara-admin::users.column.middlename') }}</legend>
							</div>
							<div class="col-span-12 md:col-span-8">
								<input type="text" name="middlename" id="middlename" class="input w-full" value="{{ old('middlename') }}" />
							</div>
						</div>
					</fieldset>

					<fieldset class="fieldset w-full my-2">
						<div class="grid grid-cols-12 gap-4">
							<div class="col-span-12 md:col-span-4">
								<legend class="fieldset-legend">{{ _q('lara-admin::users.column.lastname') }}</legend>
							</div>
							<div class="col-span-12 md:col-span-8">
								<input type="text" name="lastname" id="lastname" class="input w-full" value="{{ old('lastname') }}" required/>
							</div>
						</div>
					</fieldset>

					<fieldset class="fieldset w-full my-2 relative">
						<div class="grid grid-cols-12 gap-4 ga">
							<div class="col-span-12 md:col-span-4">
								<legend class="fieldset-legend">{{ _q('lara-admin::users.column.password') }}</legend>
							</div>
							<div class="col-span-12 md:col-span-8">
								<input id="password" name="password" type="password" class="input w-full pe-8" autocomplete="new-password" required>
								<a href="javscript:void(0)" class="js-toggle-password1 toggle-password absolute top-4 right-3 text-gray-600">
									<x-heroicon-o-eye class="toggle-eye w-4 h-4"/>
									<x-heroicon-o-eye-slash class="toggle-eye-slash w-4 h-4"/>
								</a>
							</div>
						</div>
					</fieldset>

					<fieldset class="fieldset w-full my-2 relative">
						<div class="grid grid-cols-12 gap-4">
							<div class="col-span-12 md:col-span-4">
								<legend class="fieldset-legend">{{ _q('lara-admin::users.column.password_confirmation') }}</legend>
							</div>
							<div class="col-span-12 md:col-span-8">
								<input id="password_confirmation" name="password_confirmation" type="password" class="input w-full" autocomplete="new-password_confirmation" required>
								<a href="javscript:void(0)" class="js-toggle-password2 toggle-password absolute top-4 right-3 text-gray-600">
									<x-heroicon-o-eye class="toggle-eye w-4 h-4"/>
									<x-heroicon-o-eye-slash class="toggle-eye-slash w-4 h-4"/>
								</a>
							</div>
						</div>
					</fieldset>

					<button type="submit" class="btn btn-primary shadow-primary btn-lg w-full my-3">
						{{ _q('lara-common::auth.button.register') }}
					</button>

					<div class="border-b-1 border-slate-200 h-0 my-2"></div>

					<a href="{{ route('login') }}" class="block text-sm my-2">
						{{ _q('lara-common::auth.button.back_to_login') }}
					</a>


				</form>
			</div>
		</div>
	</div>
@endsection
