<div class="gallery row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">

	@foreach($data->object->gallery as $img)
		<div class="col">
			<a href="{!! glideUrl($img->path, 1920, 1440) !!}" class="gallery-item rounded-3" data-sub-html='<h6 class="fs-sm text-light">{{ $img->caption }}</h6>'>
				<img src="{!! glideUrl($img->path, 960, 720) !!}" alt="Gallery thumbnail">
				<div class="gallery-item-caption fs-sm fw-medium">{{ $img->caption }}</div>
			</a>
		</div>
	@endforeach

</div>