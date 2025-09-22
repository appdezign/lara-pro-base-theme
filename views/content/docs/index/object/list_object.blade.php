<div class="row object-tree-sort-row py-6">
	<div class="col-1 text-center">
		<i class="fad fa-file-alt"></i>
	</div>
	<div class="col-11">
		<a href="{{ route($activeroute->getActiveRoute() . '.show', $obj->routeVars) }}">
			{{ $obj->title }}
		</a>
	</div>
</div>