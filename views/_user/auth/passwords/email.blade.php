@extends('layout_auth')

@section('content')

	<div class="flex h-full justify-center items-center">
		<div class="card bg-white shadow-sm" style="width: 360px; max-width: 100%;">

			<div class="card-body">

				<h1 class="h2 card-title mb-2">
					{{ ucfirst(_q('lara-front::auth.headers.password_forgot')) }}
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

				<form method="POST" action="{{ route('password.email') }}" class="needs-validation mb-2" novalidate="">

					{!! csrf_field()  !!}

					<label class="input validator my-3">
						<svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
							<g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
								<rect width="20" height="16" x="2" y="4" rx="2"></rect>
								<path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
							</g>
						</svg>
						<input type="email" name="email" placeholder="{{ _q('lara-admin::users.column.email') }}" value="{{ old('email') }}" required/>
					</label>

					<button type="submit" class="btn btn-primary shadow-primary btn-lg w-full my-3">
						{{ _q('lara-common::auth.button.send_password_reset_link') }}
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
