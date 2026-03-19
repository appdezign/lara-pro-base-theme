@php
	$nodeclass = $node->isLeaf() ? 'isLeaf' : 'hasChildren';
	$htag = ($node->depth < 6) ? $node->depth + 2 : 6;
	$htagopen = '<h' . $htag .'>';
	$htagclose = '</h' . $htag .'>';
@endphp

@if(empty($data->menutag) || $node->id == $data->menutag->id)

	{{-- Tag Title --}}
	{!! $htagopen !!}{{ $node->title }}{!! $htagclose !!}

	{{-- Render Objects --}}
	@if($node->objects->count() > 0)
		<div class="grid sm:grid-cols-2 lg:grid-cols-{{ $data->params->getGridCols() }} gap-6">
			@foreach($node->objects as $obj)
				@include('content.' . $entity->getResourceSlug() . '.index.object.'.$data->params->getVType().'_object')
			@endforeach
		</div>
	@endif

@endif

{{-- Render Children --}}
@if (!$node->isLeaf())
	@if(!empty($node->children))
		@foreach ($node->children as $node)
			@if($node->publish == 1)
				@include('content._partials.sort_by_tag_grid_render', $node)
			@endif
		@endforeach
	@endif
@endif

