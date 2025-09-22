<div class="tag-menu-container">

	<div class="collapse-button">
		<a class="btn btn-sm btn-primary" data-bs-toggle="collapse" href="#collapseTagmenu" role="button"
		   aria-expanded="false"
		   aria-controls="collapseExample">
			Filters
		</a>
	</div>

	<div class="collapse" id="collapseTagmenu">

		<div class="mb-20" style="min-height:25px;">
			@if($data->params->getFilterByTaxonomy())
				<a href="{{ route('entitytag.'.$entity->getResourceSlug().'.index') }}" style="display:block;">
					{{ _q('lara-app::default.tag.show_all') }}
					{{ _q('lara-app::'.$entity->getResourceSlug().'.entity.entity_plural') }}
				</a>
			@endif
		</div>

		@foreach($data->terms as $taxonomy => $terms)

			<div>
				<h3>{{ ucfirst(_q('lara-front::taxonomy.plural.' . $taxonomy)) }}</h3>
				<ul class="tagmenu {{ $taxonomy }} mb-48">
					@foreach($terms as $node)
						@include('content._partials.tag_menu_render', $node)
					@endforeach
				</ul>
			</div>

		@endforeach
	</div>
</div>
