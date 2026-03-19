<div class="grid grid-cols-12 mt-6">
	<div class="col-span-12 sm:col-span-6">
		@if($data->prev)
			<a href="{{ route($activeroute->getActiveRoute(), $data->prev->slug) }}" class="btn btn-primary">
				<x-heroicon-o-chevron-left class="w-4 h-4" />
				{{ _q('lara-front::default.button.page_prev') }}
			</a>
		@endif
	</div>
	<div class="col-span-12 sm:col-span-6 text-end">
		@if($data->next)
			<a href="{{ route($activeroute->getActiveRoute(), $data->next->slug) }}" class="btn btn-primary">
				{{ _q('lara-front::default.button.page_next') }}
				<x-heroicon-o-chevron-right class="w-4 h-4" />
			</a>
		@endif
	</div>
</div>
