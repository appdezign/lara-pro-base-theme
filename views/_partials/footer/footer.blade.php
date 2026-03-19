<footer class="lara-footer" data-theme="dark">
	<div class="container">
		<div class="grid grid-cols-12 gap-12 py-16">
			<div class="col-span-12 md:col-span-6 lg:col-span-5 xl:col-span-4">

				@include('larawidget', ['hook' => 'footer1'])
				@include('_partials.footer.footer_subscribe')

			</div>
			<div class="col-span-12 md:col-span-2 md:col-start-7">

				@include('larawidget', ['hook' => 'footer2'])

			</div>
			<div class="col-span-12 md:col-span-2">

				@include('larawidget', ['hook' => 'footer3'])

			</div>
			<div class="col-span-12 md:col-span-2">
				@include('larawidget', ['hook' => 'footer4'])
			</div>

		</div>
	</div>
</footer>

<footer data-theme="dark">
	<div class="container">
		<div class="flex flex-col md:flex-row justify-between py-6">
			<div class="copyright opacity-80">
				<p>Copyright - All right reserved</p>
			</div>
			<div class="poweredby opacity-80">
				<p>Powered by Lara CMS Pro v10</p>
			</div>
		</div>
	</div>
</footer>
