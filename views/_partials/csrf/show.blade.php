@if($type == 'input')
<input type="hidden" name="_token" value="{{ $csrftoken }}">
@elseif($type == 'meta')
<meta name="csrf-token" content="{{ $csrftoken }}">
@else
{{ $csrftoken }}
@endif