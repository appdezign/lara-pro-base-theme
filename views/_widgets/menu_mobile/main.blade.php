@if($tree)
	@foreach($tree as $node)
		@include('_widgets.menu_mobile.menu_render', $node)
	@endforeach
@endif