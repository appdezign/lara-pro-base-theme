@if(Auth::check() && $ispreview)
	<section class="preview-bar bg-orange-100">
		<div class="container">
			<div class="grid grid-cols-12">
				<div class="col-span-12 text-sm/4 text-start md:text-center p-2 ">
					<div class="float-end">[  ]</div>
					Lara CMS Preview
				</div>
			</div>
		</div>
	</section>
@endif