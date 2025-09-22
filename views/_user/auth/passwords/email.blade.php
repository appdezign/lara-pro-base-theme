@extends('layout_auth')

@section('content')

	<div class="d-flex h-100 justify-content-center align-items-center">
		<div class="card shadow-sm" style="width: 360px; max-width: 100%;">

			<div class="card-header d-flex justify-content-start ">
				{!! Theme::img('images/lara8-logo.svg', 'Lara CMS', 'me-16', ['width' => '48']) !!}
				<h1 class="fs-18 mt-12">
					{{ ucfirst(_q('lara-common::auth.passwordforgot.password_forgot_title')) }}
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

				<form method="POST" action="{{ route('password.email') }}" class="needs-validation mb-2" novalidate="">

					{!! csrf_field()  !!}

					<div class="position-relative mb-24">
						<input id="email" type="text" class="form-control" name="email"
						       value="{{ old('email') }}"
						       placeholder="{{ _q('lara-common::auth.passwordforgot.placeholder_email') }}"
						       required
						       autofocus>
						<div class="invalid-feedback position-absolute start-0 top-100">
							Please enter a valid email address!
						</div>
					</div>

					<button type="submit" class="btn btn-primary shadow-primary btn-lg w-100">
						{{ _q('lara-common::auth.button.send_password_reset_link') }}
					</button>

					<hr class="my-24">
					<div class="row mt-24">
						<div class="col-sm-12">
							<a href="{{ route('login') }}" class="fs-14">
								{{ _q('lara-common::auth.button.back_to_login') }}
							</a>
						</div>
					</div>

				</form>

			</div>
		</div>
	</div>

@endsection
