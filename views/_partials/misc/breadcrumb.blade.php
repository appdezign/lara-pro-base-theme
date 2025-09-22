<!-- Breadcrumb -->
@if(!isset($data->page) || $data->page->ishome == 0)
	<nav class="container pt-16 mt-lg-16" aria-label="breadcrumb">
		@widget('BreadcrumbWidget', ['lang' => 'nl', 'grid' => $data->grid])
	</nav>
@endif