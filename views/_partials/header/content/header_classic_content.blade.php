<!-- Main Menu -->
<div id="navbarNav" class="offcanvas offcanvas-end">
	<div class="offcanvas-header border-bottom">
		<h5 class="offcanvas-title">Menu</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">
		<ul class="navbar-nav me-auto mb-8 mb-lg-0">

			@widget('menuWidget', ['mnu' => 'main', 'showroot' => false, 'grid' => $data->grid])

		</ul>
	</div>
</div>

<button type="button" class="navbar-toggler ms-auto" data-bs-toggle="offcanvas" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>

