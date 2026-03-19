<div class="navbar-center hidden lg:flex">

	<ul class="menu menu-horizontal">

		@widget('menuWidget', ['mnu' => 'main', 'showroot' => false, 'grid' => $data->grid])

	</ul>

</div>

<div class="navbar-end">
	<!-- Mobile Menu Toggle -->
	<div class="flex-none lg:hidden py-2">
		<label for="lara-mobile-drawer" aria-label="open sidebar" class="block p-2">
			<x-heroicon-o-bars-3 class="h-6 w-6"/>
		</label>
	</div>
</div>

