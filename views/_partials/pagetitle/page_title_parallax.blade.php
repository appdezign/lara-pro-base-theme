@if(isset($data->page) && !$data->page->hasHero())

	@widget('pagetitleWidget', ['term' => 'pagetitle', 'grid' => $data->grid])

@endif
