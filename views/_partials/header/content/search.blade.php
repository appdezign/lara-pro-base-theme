<div class="js-searchbar searchbar bg-indigo-50">
	<div class="container">
		<div class="grid grid-cols-12">
			<div class="col-span-12 md:col-span-8 md:col-start-3 lg:col-span-6 lg:col-start-4 py-12">

				{{ html()->form('GET', route('special.search.result'))
					->attributes(['accept-charset' => 'UTF-8'])
					->class('searchbar__form')
					->open() }}

				<div class="join flex">
					<div class="grow-1">
						<label class="input validator join-item flex w-full rounded-tl-full rounded-bl-full">
							<x-heroicon-o-magnifying-glass class="w-5 h-6"/>
							<input type="search" name="keywords" placeholder="Zoek op trefwoord" required/>
						</label>
					</div>
					<button class="btn btn-primary join-item rounded-tr-full rounded-br-full">Search</button>
				</div>

				{{ html()->form()->close() }}




				<!--
				<div class="flex px-4">
					<div class="grow-1">
						<div class="relative">
							<div class="absolute top-2 left-2 z-10 text-gray-400">
								<x-heroicon-o-magnifying-glass class="w-5 h-6" />
							</div>
						</div>
						<input id="street-address" type="text" name="street-address" autocomplete="street-address" class="w-full !ps-10 h-[2.5rem] !rounded-tr-none !rounded-br-none">
					</div>
					<button class="btn btn-primary h-[2.5rem] -ms-px rounded-tl-none rounded-bl-none">Search</button>
				</div>
				-->

			</div>
		</div>
	</div>
</div>

