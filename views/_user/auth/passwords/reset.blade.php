@extends('layout_auth')

@section('content')

	<div class="flex h-full justify-center items-center">
		<div class="card bg-white shadow-sm" style="width: 360px; max-width: 100%;">

			<div class="card-body">

				<h1 class="h2 card-title mb-2">
					{{ ucfirst(_q('lara-front::auth.headers.password_reset')) }}
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

				@if (session('status'))
					<div class="alert alert-success alert-important mb-6" role="alert">
						{{ session('status') }}
					</div>
				@endif

				@if($email)

					<form role="form" method="POST" action="{{ route('password.request') }}">

						{{ csrf_field() }}

						<input type="hidden" name="token" value="{{ $token }}">

						<fieldset class="fieldset w-full">
							<legend class="fieldset-legend">{{ _q('lara-admin::users.column.email') }}</legend>
							<input type="email" name="email" id="email" class="input w-full" value="{{ $email }}" disabled/>
							<input id="email" type="hidden" name="email" value="{{ $email }}">
						</fieldset>

						<fieldset class="fieldset w-full relative">
							<legend class="fieldset-legend">{{ _q('lara-admin::users.column.new_password') }}</legend>
							<input id="password" name="password" type="password" class="input w-full pe-8" required>
							<a href="javscript:void(0)" class="js-toggle-password1 toggle-password absolute top-4 right-3 text-gray-600">
								<x-heroicon-o-eye class="toggle-eye w-4 h-4"/>
								<x-heroicon-o-eye-slash class="toggle-eye-slash w-4 h-4"/>
							</a>
						</fieldset>

						<fieldset class="fieldset w-full relative">
							<legend class="fieldset-legend">{{ _q('lara-admin::users.column.new_password_confirmation') }}</legend>
							<input id="password_confirmation" name="password_confirmation" type="password" class="input w-full" required>
							<a href="javscript:void(0)" class="js-toggle-password2 toggle-password absolute top-4 right-3 text-gray-600">
								<x-heroicon-o-eye class="toggle-eye w-4 h-4"/>
								<x-heroicon-o-eye-slash class="toggle-eye-slash w-4 h-4"/>
							</a>
						</fieldset>

						<button type="submit" class="btn btn-primary shadow-primary btn-lg w-full my-3">
							{{ _q('lara-common::auth.button.reset_password') }}
						</button>

					</form>
				@else
					<div class="alert alert-warning">
						{{ _q('lara-common::auth.field.email_not_found') }}
					</div>
				@endif

			</div>
		</div>
	</div>

@endsection

