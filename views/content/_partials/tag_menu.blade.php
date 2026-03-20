<div class="tag-menu-container">

	<style>
		@media(min-width: 992px) {
			.collapse-content {
				content-visibility: visible !important;
				min-height: 500px !important;
			}
		}
	</style>

	<div class="collapse">

		<input type="checkbox" class="block lg:hidden w-[4rem]" />
		<div class="collapse-title font-semibold block lg:hidden w-[4rem]">
			<a class="btn btn-sm btn-primary">
				Filters
			</a>
		</div>

		<div class="collapse-content">

			<div class="mb-1" style="min-height:25px;">
				@if($data->params->getFilterByTaxonomy())
					<a href="{{ route($activeroute->getPrefix().'.'.$entity->getResourceSlug().'.'.$activeroute->getMenuId().'.index') }}" style="display:block;">
						{{ _q('lara-app::default.tag.show_all') }}
						{{ _q('lara-app::'.$entity->getResourceSlug().'.entity.entity_plural') }}
					</a>
				@endif
			</div>

			@foreach($data->terms as $taxonomy => $terms)
				<div>
					<h4 class="h4">{{ ucfirst(_q('lara-front::taxonomy.plural.' . $taxonomy)) }}</h4>
					<ul class="tagmenu {{ $taxonomy }} mb-8">
						@foreach($terms as $node)
							@include('content._partials.tag_menu_render', $node)
						@endforeach
					</ul>
				</div>
			@endforeach
		</div>
	</div>


</div>
