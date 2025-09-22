{{-- Global widdgets --}}
@foreach($globalwidgets as $larawidget)
	@if($larawidget->hook == $hook)

		@if($larawidget->type == 'module')
			@if($larawidget->usecache)
				@widget('laraEntityCacheWidget', ['widget_id' => $larawidget->id, 'grid' => $data->grid])
			@else
				@widget('laraEntityWidget', ['widget_id' => $larawidget->id, 'grid' => $data->grid])
			@endif
		@else
			@widget('laraTextWidget', ['widget_id' => $larawidget->id, 'grid' => $data->grid])
		@endif

	@endif
@endforeach

@if($entity->getCgroup() == 'page')

	{{-- single pages --}}
	@if(isset($data->object))
		@foreach($data->object->widgets as $larawidget)
			@if($larawidget->hook == $hook)

				@if($larawidget->type == 'module')
					@if($larawidget->usecache)
						@widget('laraEntityCacheWidget', ['widget_id' => $larawidget->id, 'grid' => $data->grid])
					@else
						@widget('laraEntityWidget', ['widget_id' => $larawidget->id, 'grid' => $data->grid])
					@endif
				@else
					@if($larawidget->usecache)
						@widget('laraTextCacheWidget', ['widget_id' => $larawidget->id, 'grid' => $data->grid])
					@else
						@widget('laraTextWidget', ['widget_id' => $larawidget->id, 'grid' => $data->grid])
					@endif
				@endif

			@endif
		@endforeach
	@endif

@else

	{{-- entity page with associated block --}}
	@if(isset($data->page))
		@if(isset($data->page->widgets))
			@foreach($data->page->widgets as $larawidget)
				@if($larawidget->hook == $hook)

					@if($larawidget->type == 'module')
						@if($larawidget->usecache)
							@widget('laraEntityCacheWidget', ['widget_id' => $larawidget->id, 'grid' => $data->grid])
						@else
							@widget('laraEntityWidget', ['widget_id' => $larawidget->id, 'grid' => $data->grid])
						@endif
					@else
						@widget('laraTextWidget', ['widget_id' => $larawidget->id, 'grid' => $data->grid])
					@endif

				@endif
			@endforeach
		@endif
	@endif

@endif










