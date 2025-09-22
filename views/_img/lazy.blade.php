<?php

$preventCropping = (property_exists($lzobj, 'prevent_cropping') && $lzobj->prevent_cropping == 1);
$forceCropping = (isset($fc)) ? $fc : true;
$dim = _imgdim($lzw, $lzh, $preventCropping, $forceCropping);
$displaywidth = (isset($dw)) ? $dw : $lzw;
$displayheight = (isset($dh)) ? $dh : $lzh;
$aspectRatio = (isset($ar)) ? $ar : '4x3';
$extraClasses = (isset($cl)) ? $cl : '';
$hasContainer = (isset($cnt)) ? $cnt : false;
$containerClass = (isset($cntclass)) ? $cntclass : false;
?>

@if($lzh == 0)
	{{-- no cropping, no ratio --}}
	<img data-src="{{ _cimg($lzobj->filename, $dim['w'], $dim['h'], null, $dim['f']) }}"
	     width="{{ $displaywidth }}"
	     height="{{ $displaywidth }}"
	     title="{{ $lzobj->seo_title }}"
	     alt="{{ $lzobj->seo_alt }}"
	     class="lazyload {{ $extraClasses }}"/>
@else

	@if($forceCropping)
		@if($hasContainer)
			<div class="img-container {{ $containerClass }}" style="width:{{ $dw }}px; height:{{ $dh }}px">
				<div class="ratio ratio-{{ $aspectRatio }}">
					<img data-src="{{ _cimg($lzobj->filename, $dim['w'], $dim['h'], null, $dim['f']) }}"
					     width="{{ $displaywidth }}"
					     height="{{ $displayheight }}"
					     title="{{ $lzobj->seo_title }}"
					     alt="{{ $lzobj->seo_alt }}"
					     class="lazyload {{ $extraClasses }}"/>
				</div>
			</div>
		@else
			<div class="ratio ratio-{{ $aspectRatio }}">
				<img data-src="{{ _cimg($lzobj->filename, $dim['w'], $dim['h'], null, $dim['f']) }}"
				     width="{{ $displaywidth }}"
				     height="{{ $displayheight }}"
				     title="{{ $lzobj->seo_title }}"
				     alt="{{ $lzobj->seo_alt }}"
				     class="lazyload {{ $extraClasses }}"/>
			</div>
		@endif
	@else
		<img data-src="{{ _cimg($lzobj->filename, $dim['w'], $dim['h'], null, $dim['f']) }}"
		     width="{{ $displaywidth }}"
		     height="{{ $displaywidth }}"
		     title="{{ $lzobj->seo_title }}"
		     alt="{{ $lzobj->seo_alt }}"
		     class="lazyload {{ $extraClasses }}"/>
	@endif

@endif
