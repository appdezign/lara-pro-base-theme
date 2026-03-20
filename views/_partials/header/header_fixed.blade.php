<div class="drawer">
	<input id="lara-mobile-drawer" type="checkbox" class="drawer-toggle"/>
	<div class="drawer-content flex flex-col py-2 relative">

		<div class="navbar fixed top-0 right-0 left-0 z-100">
			<div class="container flex">
				@include('_partials.header.content.main_nav_full')
			</div>

			@include('_partials.header.content.search')

		</div>

	</div>
	<div class="drawer-side">

		<label for="lara-mobile-drawer" aria-label="close sidebar" class="drawer-overlay"></label>

		<div class="menu bg-base-200 min-h-full w-80">

			<!-- Close Drawer Button -->
			<div class="flex justify-between px-3 py-5 border-b-1 border-gray-200">
				<h4 class="heading text-lg font-bold text-primary">Menu</h4>
				<label for="lara-mobile-drawer" aria-label="close sidebar" class="text-gray-700 w-6 h-6">
					<x-heroicon-o-x-mark/>
				</label>
			</div>

			<div class="py-3">
				@include('_partials.header.content.mobile_nav')
			</div>
		</div>
	</div>
</div>
