<div class="flex justify-between items-center">

	<!-- Logo -->
	<a href="/" class="flex items-center">
		{!! Theme::img('images/company-logo.png', 'Lara CMS', 'mr-2', ['width' => '47']) !!}
		<span class="text-xl font-medium">Lara 10</span>
	</a>

	<div class="flex">
		<a href="javascript:void(0)" class="js-search-btn px-3 pt-[1.125rem] pb-[0.875rem]">
			<x-heroicon-o-magnifying-glass class="w-6 h-6 text-gray-500"/>
		</a>

		<!-- Topmenu -->
		@widget('MenuLevelOneWidget', ['mnu' => 'top'])

	</div>


</div>