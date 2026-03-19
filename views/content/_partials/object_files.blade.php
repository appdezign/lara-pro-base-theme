<p class="my-4 font-bold">{{ ucfirst(_q('lara-front::default.headers.related_files')) }}:</p>

<ul class="mb-8">
	@if($data->object->files)
		@foreach($data->object->files->entity_files as $objfile)
			<li>
				<a href="{{ $entity->getFileUrl( $objfile['doc_filename']) }}" target="_blank" class="block bg-secondary">
					<div class="grid grid-cols-12">
						<div class="hidden sm:block sm:col-span-1 text-center bg-primary text-white px-2 py-3">
							{{ strtoupper(pathinfo($objfile['doc_filename'], PATHINFO_EXTENSION)) }}
						</div>
						<div class="col-span-12 sm:col-span-10 p-3">
							{{ $objfile['doc_original'] }}
						</div>
						<div class="col-span-2 sm:col-span-1 text-center p-3 text-gray-800">
							<x-heroicon-s-arrow-down-tray class="inline-block w-6 h-6"/>
						</div>
					</div>
				</a>
			</li>
		@endforeach
	@endif
</ul>

