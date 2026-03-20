@extends('layout')

@section('content')

	@include('content.'.$entity->getResourceSlug().'.show.single')

@endsection

