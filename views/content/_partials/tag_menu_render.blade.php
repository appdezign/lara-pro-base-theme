<li @if($node->isLeaf() && $node->object_count== 0) class="hidden" @endif>

	<a href="{{ route($activeroute->getPrefix() .'.' . $entity->getResourceSlug() . '.'. $node->route . '.index') }}"
	   class="@if($node->slug == $data->params->getFilterByTaxonomy()) active @endif">
		{{ $node->title }}
	</a>

	@if(!$node->isLeaf())
		<ul>
			@foreach($node->children as $node)
				@include('content._partials.tag_menu_render', $node)
			@endforeach
		</ul>
	@endif

</li>




