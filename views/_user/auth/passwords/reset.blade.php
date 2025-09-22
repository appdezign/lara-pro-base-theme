@extends('layout_auth')

@section('content')

	<div class="d-flex h-100 justify-content-center align-items-center">
		<div class="card shadow-sm" style="width: 360px; max-width: 100%;">

			<div class="card-header d-flex justify-content-start ">
				{!! Theme::img('images/lara8-logo.svg', 'Lara CMS', 'me-16', ['width' => '48']) !!}
				<h1 class="fs-18 mt-12">
					{{ ucfirst(_q('lara-common::auth.passwordforgot.password_reset_title')) }}
				</h1>
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
				@endif

				@if (session('status'))
					<div class="alert alert-success alert-important mb-6" role="alert">
						{{ session('status') }}
					</div>
				@endif

				@if($email)

					<form class="form-horizontal" role="form" method="POST"
					      action="{{ route('password.request') }}">

						{{ csrf_field() }}

						<input type="hidden" name="token" value="{{ $token }}">

						<div class="fv-row mb-24">
							<label for="password">{{ _q('lara-common::auth.field.email') }}</label>
							<input id="email" name="email" type="email" value="{{ $email }}" class="form-control" disabled>
							<input id="email" type="hidden" name="email" value="{{ $email }}">
						</div>

						<div class="fv-row mb-24">
							<label for="password">{{ _q('lara-common::auth.field.password') }}</label>
							<input id="password" name="password" type="password" class="form-control" required>
						</div>

						<div class="fv-row mb-24">
							<label for="password-confirm">{{ _q('lara-common::auth.field.confirm_password') }}</label>
							<input id="password-confirm" name="password_confirmation" type="password" class="form-control"  required>
						</div>

						<div class="d-grid">
							<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
								<span class="indicator-label">
									{{ _q('lara-common::auth.button.reset_password') }}
								</span>
							</button>
						</div>

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
