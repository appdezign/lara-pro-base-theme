@extends('layouts.app')

@section('content')

	<div class="flex h-full justify-center items-center">
		<div class="card bg-white shadow-sm" style="width: 360px; max-width: 100%;">

			<div class="card-body">

				<h1 class="h2 card-title mb-2">
					{{ ucfirst(_q('lara-front::auth.headers.verify_email')) }}
				</h1>

				<div class="border-b-1 border-slate-200 h-0 my-2"></div>

				@if (session('resent'))
					<div class="alert alert-success" role="alert">
						{{ __('A fresh verification link has been sent to your email address.') }}
					</div>
				@endif

				{{ __('Before proceeding, please check your email for a verification link.') }}
				{{ __('If you did not receive the email') }},

				<form class="inline" method="POST" action="{{ route('verification.resend') }}">
					@csrf
					<button type="submit" class="btn btn-primary shadow-primary btn-lg w-full my-3">
						{{ __('click here to request another') }}
					</button>
				</form>
			</div>
		</div>
	</div>
@endsection
