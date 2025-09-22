<p>{{ _q('lara-front::default.headers.related_docs') }}:</p>

<ul class="object-related-files">

	@if($data->object->files)

		@foreach($data->object->files->entity_files as $objfile)

				<?php
					$filename = $objfile['doc_filename'];

				if ($data->object->publish == 1) {
					$fileUrl = Storage::disk('public')->url( $filename);
				} else {
					if (Auth::check()) {
						$fileUrl = Storage::disk('public')->url('_archive/' . $filename);
					} else {
						$fileUrl = '#';
					}
				}
				?>

			<li>
				<a href="{{ $fileUrl }}"
				   target="_blank" class="bg-secondary">
					<div class="row m-0">

						<div class="col-sm-1 d-none d-sm-block text-center col1">
							{{ strtoupper(pathinfo($filename, PATHINFO_EXTENSION)) }}
						</div>
						<div class="col-10 col2">
							{{ $objfile['doc_original'] }}
						</div>
						<div class="col-2 col-sm-1 text-center col3">
							<i class="far fa-arrow-to-bottom"></i>
						</div>
					</div>
				</a>
			</li>
		@endforeach
	@endif

</ul>
