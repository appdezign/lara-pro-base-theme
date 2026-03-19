@extends('layout')

@section('content')

	@include('content.'.$entity->getResourceSlug().'.index.index_' . $data->params->getTagsView() )

@endsection