@extends('layout')

@section('head-after')
	<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')

	@include('_user.profile.show.show')

@endsection
