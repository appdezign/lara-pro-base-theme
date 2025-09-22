@if ($node->childobjectcount > 0)

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
			<div class="row multi-columns-row">
				@foreach($node->objects as $obj)
					<div class="col-sm-{{ $data->params->getGridCol() }} col-md-{{ $data->params->getGridCol() }} col-lg-{{ $data->params->getGridCol() }}">
						@include('content.' . $entity->getResourceSlug() . '.index.object.'.$data->params->getVType().'_object')
					</div>
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

@endif