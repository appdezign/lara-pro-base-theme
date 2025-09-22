<div class="gallery mt-48 row row-cols-1 row-cols-sm-2 row-cols-md-3 g-24"  data-thumbnails="true">

	@foreach($data->object->getGallery() as $img)
		<div class="col">
			<a href="{{ _cimg($img->filename, 960, 580) }}" class="gallery-item rounded-3" data-sub-html='<h6 class="fs-sm text-light">{{ $img->caption }}</h6>'>
				<img src="{{ _cimg($img->filename, 960, 720) }}" alt="Gallery thumbnail">
				<div class="gallery-item-caption text-center fs-14 fw-medium">{{ $img->caption }}</div>
			</a>
		</div>
	@endforeach

</div>