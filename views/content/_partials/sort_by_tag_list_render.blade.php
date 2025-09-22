

	@php
		$nodeclass = $node->isLeaf() ? 'isLeaf' : 'hasChildren';
		$htag = ($node->depth < 6) ? $node->depth + 2 : 6;
		$htagopen = '<h' . $htag .'>';
		$htagclose = '</h' . $htag .'>';
	@endphp

	<li class="{{ $nodeclass }}">

		@if(empty($data->menutag) || $node->id == $data->menutag->id)

			{{-- Tag Title --}}
			{!! $htagopen !!}{{ $node->title }}{!! $htagclose !!}

			{{-- Render Objects --}}
			@if($node->objects->count() > 0)
				<div class="object-list mb-48">
					<table class="table table-striped">
						@foreach($node->objects as $obj)
							@include('content.' . $entity->getResourceSlug() . '.index.object.'.$data->params->getVType().'_object')
						@endforeach
					</table>
				</div>
			@endif

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

