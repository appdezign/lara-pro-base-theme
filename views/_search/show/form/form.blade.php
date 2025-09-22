{{ html()->form('GET', route('special.search.result'))
		->attributes(['accept-charset' => 'UTF-8'])
		->open() }}

<div class="row form-group">
	<div class="col-12 col-md-2">
		{{ html()->label('Search :', 'keywords') }}
	</div>
	<div class="col-12 col-md-8">
		{{ html()->text('keywords', null)->class('form-control') }}
	</div>
	<div class="col-12 col-md-2">
		{{ html()->button('Go', 'submit')->class('btn btn-danger save-button') }}
	</div>

</div>

{{ html()->form()->close() }}