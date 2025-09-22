<?php
$cols = config('lara-admin.userProfile');
$cvars = json_decode(json_encode($cols), false);
?>
<div class="row">
	@foreach($cvars as $cvar)

			<?php
			$cvarfname = $cvar->name;
			$cvarfieldname = '_profile_' . $cvarfname;
			$cvarfieldtype = $cvar->type;
			$cvarvalue = $data->object->profile->$cvarfname;
			?>

		@if(!$cvar->readonly)
			<div class="col-12 mt-24">
				<div class="row">
					<div class="col-4">

						{{ html()->label(_q('lara-' . $entity->getModule().'::'.$entity->getResourceSlug().'.column.' .$cvarfieldname) .':', $cvarfieldname) }}
					</div>
					<div class="col-8">

						@if($cvarfieldtype == 'string')
							{{ html()->text($cvarfieldname, null)->class('form-control') }}
						@endif

						@if($cvarfieldtype == 'text')
							{{ html()->textarea($cvarfieldname, null)
									->class('form-control')
									->rows(4) }}
						@endif

						@if($cvarfieldtype == 'integer')
							{{ html()->input('number', $cvarfieldname, null)
								->class('form-control')
								->attributes(['step' => '1']) }}
						@endif

						@if($cvarfieldtype == 'boolean')
							{{ html()->hidden($cvarfieldname, 0) }}
							<div class="form-check">
								{{ html()->checkbox($cvarfieldname, null, 1)
								->class('form-check-input') }}
							</div>
						@endif

					</div>
				</div>
			</div>
		@endif

	@endforeach

</div>
