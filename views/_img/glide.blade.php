<?php

// image dimensions
$imageWidth = $width ?? 480;
$imageHeight = $height ?? 480;

// image attributes
$imageFit = $fit ?? 'crop';
$imageFormat = $format ?? 'webp';
$imageClasses = $class ?? '';
$aspectRatio = $ratio ?? false;

if($height == 0) {
	// show original dimensions
	$height = $width * $media->height / $media->width;
	$imageFit = 'contain';
}

$displayWidth = $dwidth ?? $width;
$displayHeight = $dheight ?? $height;

// container
$containerClass = $cntclass ?? false;

// source
$source = glideUrl($media->path, $imageWidth, $imageHeight, $imageFit, $imageFormat);

?>

@if($aspectRatio)

	@if($containerClass)
		<div class="img-container {{ $containerClass }}"
		     style="width:{{ $displayWidth }}px; height:{{ $displayHeight }}px">
			<div class="aspect-{{ $aspectRatio }}">
				<img data-src="{!! $source !!}"
				     width="{{ $displayWidth }}"
				     height="{{ $displayHeight }}"
				     title="{{ $media->title }}"
				     alt="{{ $media->alt }}"
				     class="lazyload {{ $imageClasses }}"/>
			</div>
		</div>
	@else
		<div class="aspect-{{ $aspectRatio }}">
			<img data-src="{!! $source !!}"
			     width="{{ $displayWidth }}"
			     height="{{ $displayHeight }}"
			     title="{{ $media->title }}"
			     alt="{{ $media->alt }}"
			     class="lazyload {{ $imageClasses }}"/>
		</div>
	@endif

@else

	<img data-src="{!! $source !!}"
	     width="{{ $displayWidth }}"
	     height="{{$displayHeight }}"
	     title="{{ $media->title }}"
	     alt="{{ $media->alt }}"
	     class="lazyload {{ $imageClasses }}"/>

@endif
