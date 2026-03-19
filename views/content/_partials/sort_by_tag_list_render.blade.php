@php
	$nodeclass = $node->isLeaf() ? 'isLeaf' : 'hasChildren';
	$htag = ($node->depth < 6) ? $node->depth + 2 : 6;
	$htagopen = '<h' . $htag .' class="card-title">';
	$htagclose = '</h' . $htag .' class="card-title">';
@endphp

<li class="{{ $nodeclass }}">

	@if(empty($data->menutag) || $node->id == $data->menutag->id)

		<div class="card shadow-md mb-8">
			<div class="card-body">
				{!! $htagopen !!}{{ $node->title }}{!! $htagclose !!}
				@if($node->objects->count() > 0)
					<div class="card mb-12">
						@foreach($node->objects as $obj)
							@include('content.' . $entity->getResourceSlug() . '.index.object.'.$data->params->getVType().'_object')
						@endforeach
					</div>
				@endif
			</div>
		</div>

	@endif

	{{-- Render Children --}}
	@if (!$node->isLeaf())
		<ul class="children">
			@if(!empty($node->children))
				@foreach ($node->children as $node)
					@if($node->publish == 1)
						@include('content._partials.sort_by_tag_list_render', $node)
					@endif
				@endforeach
			@endif
		</ul>
	@endif
</li>

