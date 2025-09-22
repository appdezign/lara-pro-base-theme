@if(isset($data->activetag) && $data->activetag->seo_description)
<meta name="description" content="{{ $data->activetag->seo_description }}">
@else
<meta name="description" content="{{ $data->seo->seo_description }}">
@endif
@if(isset($data->activetag) && $data->activetag->seo_keywords)
<meta name="keywords" content="{{ $data->activetag->seo_keywords }}">
@else
<meta name="keywords" content="{{ $data->seo->seo_keywords }}">
@endif