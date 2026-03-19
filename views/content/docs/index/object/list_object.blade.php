<div class="grid grid-cols-12 border-b-1 border-gray-200 py-1">
	<div class="col-span-1 text-center">
		<x-heroicon-o-document-text class="w-5 h-5" />
	</div>
	<div class="col-span-11">
		<a href="{{ route($activeroute->getSingleRoute(), $obj->routeVars) }}">
			{{ $obj->title }}
		</a>
	</div>
</div>