@extends('layout_auth')

@section('content')

	<div class="d-flex h-100 justify-content-center align-items-center">
		<div class="card shadow-sm" style="width: 360px; max-width: 100%;">
			<div class="card-header d-flex justify-content-start ">

				{!! Theme::img('images/lara8-logo.svg', 'Lara CMS', 'me-16', ['width' => '48']) !!}

				<h1 class="h2 mb-0">{{ ucfirst(_q('lara-front::user.headers.login')) }}</h1>

			</div>
			<div class="card-body">

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

				<form method="POST" action="{{ route('login') }}" class="needs-validation mb-2" novalidate="">

					{!! csrf_field()  !!}

					<div class="position-relative mb-24">
						<input id="email" type="text" class="form-control" name="email"
						       value="{{ old('email') }}"
						       placeholder="{{ _q('lara-common::auth.loginform.placeholder_username') }}"
						       required
						       autofocus>
						<div class="invalid-feedback position-absolute start-0 top-100">
							Please enter a valid email address!
						</div>
					</div>
					<div class="mb-24">
						<div class="password-toggle">
							<input id="password" type="password" class="form-control" name="password"
							       placeholder="{{ _q('lara-common::auth.loginform.placeholder_password') }}"
							       required>
							<label class="password-toggle-btn" aria-label="Show/hide password">
								<input class="password-toggle-check" type="checkbox">
								<span class="password-toggle-indicator"></span>
							</label>
							<div class="invalid-feedback position-absolute start-0 top-100">
								Please enter your password!
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary shadow-primary btn-lg w-100">Login</button>

					@if(config('lara.auth.can_reset_password'))
						<hr class="my-24">
						<div class="row mt-24">
							<div class="col-sm-12">
								<a href="{{ route('password.request') }}" class="fs-14">
									{{ _q('lara-common::auth.button.forgot_password') }}
								</a>
							</div>
						</div>
					@endif
				</form>

			</div>
		</div>
	</div>

@endsection

