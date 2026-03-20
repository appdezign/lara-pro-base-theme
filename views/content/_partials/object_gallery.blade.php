<div class="gallery grid grid-cols-12 mt-12 gap-6" data-thumbnails="true">

	@foreach($data->object->gallery() as $img)
		<div class="col-span-12 md:col-span-6 lg:col-span-4">
			<div data-src="{{ glide()->getUrl($img->path, ['w' => 1920, 'h' => 1440, 'fit' => 'crop']) }}" class="gallery-item rounded-lg" data-sub-html="">
				<img src="{{ glide()->getUrl($img->path, ['w' => 960, 'h' => 720, 'fit' => 'crop']) }}" alt="{{ $img->caption }}">
				<x-heroicon-o-magnifying-glass-plus class="gallery-item-icon"/>
			</div>
		</div>
	@endforeach

</div>