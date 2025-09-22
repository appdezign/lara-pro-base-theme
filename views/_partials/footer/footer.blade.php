<footer class="footer dark-mode bg-dark pt-48 pb-24 pb-lg-48">
	<div class="container pt-lg-24">
		<div class="row pb-48">
			<div class="col-lg-4 col-md-6">

				@include('larawidget', ['hook' => 'footer1'])

				@include('_partials.footer.footer_subscribe')

			</div>
			<div class="col-xl-6 col-lg-7 col-md-5 offset-xl-2 offset-md-1 pt-24 pt-md-4 pt-lg-0">
				<div id="footer-links" class="row">
					<div class="col-lg-4 d-none d-lg-block">
						@include('larawidget', ['hook' => 'footer2'])
					</div>
					<div class="col-xl-4 col-lg-3">
						@include('larawidget', ['hook' => 'footer3'])
					</div>
					<div class="col-xl-4 col-lg-5 pt-8 pt-lg-0">
						@include('larawidget', ['hook' => 'footer4'])
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 ">
				<p>&copy; {{ date('Y') }}, {{ $settngz->company_name }}</p>
			</div>
			<div class="col-md-6 text-end">
				<p>Realisatie: <a href="https://firmaq.nl/nl/" target="_blank">Firmaq Media</a></p>
			</div>
		</div>
	</div>
</footer>

<!-- Back to top button -->
<a href="#top" class="btn-scroll-top" data-scroll>
	<span class="btn-scroll-top-tooltip text-muted fs-14 me-8">Top</span>
	<i class="fas fa-chevron-up fs-16"></i>
</a>
