@extends('layout_auth')

@section('content')

	<div class="flex h-full justify-center items-center">
		<div class="card bg-white shadow-sm" style="width: 360px; max-width: 100%;">

			<div class="card-body">

				<h1 class="h2 card-title mb-2">
					{{ ucfirst(_q('lara-front::auth.headers.login')) }}
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

				<form method="POST" action="{{ route('login') }}" class="needs-validation mb-2" novalidate="">

					{!! csrf_field()  !!}

					<label class="input validator my-3">
						<svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
							<g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
								<rect width="20" height="16" x="2" y="4" rx="2"></rect>
								<path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
							</g>
						</svg>
						<input type="email" placeholder="{{ _q('lara-admin::users.column.email') }}" value="{{ old('email') }}" required/>
					</label>

					<label class="input validator my-3">
						<svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
							<g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
								<path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"></path>
								<circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle>
							</g>
						</svg>
						<input type="password" name="password" id="password" placeholder="{{ _q('lara-admin::users.column.password') }}" class="pe-8" required/>
						<a href="javscript:void(0)" class="js-toggle-password1 toggle-password block text-gray-600">
							<x-heroicon-o-eye class="toggle-eye w-4 h-4"/>
							<x-heroicon-o-eye-slash class="toggle-eye-slash w-4 h-4"/>
						</a>
					</label>

					<button type="submit" class="btn btn-primary shadow-primary btn-lg w-full my-3">
						Login
					</button>

					<div class="border-b-1 border-slate-200 h-0 my-2"></div>

					@if(config('lara.auth.can_reset_password'))
						<a href="{{ route('password.request') }}" class="block text-sm my-2">
							{{ _q('lara-common::auth.button.forgot_password') }}
						</a>
					@endif

					@if(config('lara.auth.can_register'))
						<a href="{{ route('register') }}" class="block text-sm my-2">
							{{ _q('lara-common::auth.button.register') }}
						</a>
					@endif
				</form>

			</div>
		</div>
	</div>

@endsection

