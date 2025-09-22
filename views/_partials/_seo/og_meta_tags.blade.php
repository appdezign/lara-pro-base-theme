@if(isset($data->opengraph))
@if($data->opengraph->og_title)
<meta property="og:title" content="{{ $data->opengraph->og_title }}">
@endif
@if($data->opengraph->og_type)
<meta property="og:type" content="{{ $data->opengraph->og_type }}">
@endif
<meta property="og:url" content="{{ url()->current() }}">
@if($data->opengraph->og_image)
<meta property="og:image" content="{{ _cimg($data->opengraph->og_image, $data->opengraph->og_image_width, $data->opengraph->og_image_height) }}">
@endif
@if($data->opengraph->og_description)
<meta property="og:description" content="{{ str_limit(strip_tags($data->opengraph->og_description), $settngz->og_descr_max, '') }}">
@endif
@if($data->opengraph->og_site_name)
<meta property="og:site_name" content="{{ $data->opengraph->og_site_name }}" />
@endif
@endif