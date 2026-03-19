{{ html()->form('GET', route('special.search.result'))->attributes(['accept-charset' => 'UTF-8'])->open() }}

<div class="grid grid-cols-12 gap-4">
	<div class="col-span-12 sm:col-span-10">
		{{ html()->text('keywords', null)->class('input w-full') }}
	</div>
	<div class="col-span-12 sm:col-span-2">
		{{ html()->button('Go', 'submit')->class('btn btn-primary w-full') }}
	</div>
</div>

{{ html()->form()->close() }}