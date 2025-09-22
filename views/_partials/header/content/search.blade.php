<div class="js-searchbar searchbar bg-secondary">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">

				{{ html()->form('GET', route('special.search.result'))
					->attributes(['accept-charset' => 'UTF-8'])
					->class('searchbar__form')
					->open() }}
					<input id="searchfield" name="keywords" class="form-control" type="search" placeholder="Zoek op trefwoord">
					<button class="btn" type="submit">
						<i class="far fa-search fs-16 text-muted"></i>
					</button>
				{{ html()->form()->close() }}

			</div>
		</div>
	</div>
</div>

