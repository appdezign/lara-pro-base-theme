@extends('layout')

@section('content')

	@include('content.'.$entity->getResourceSlug().'.show.show')

@endsection

