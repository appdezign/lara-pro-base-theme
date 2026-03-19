<div class="card">
	<div class="card-body text-center">
		<div class="card-title text-center">
			<x-heroicon-o-document-text class="w-5 h-5 mx-auto"/>
		</div>
		<a href="{{ route($activeroute->getSingleRoute(), $obj->routeVars) }}">
			{{ $obj->title }}
		</a>
	</div>
</div>
