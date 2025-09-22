@extends('email')

@section('content')

	<tr>
		<td colspan="2" align="left" valign="top"><b>{!! $maildata->content->title !!}</b></td>
	</tr>

	<tr>
		<td colspan="2" align="left" valign="top"><p>{!! $maildata->content->lead !!}</p></td>
	</tr>

	@foreach($maildata->content->data as $fieldname => $fielddata)

		<tr>
			<td width="200" align="left" valign="top">{{ $fielddata['colname'] }}</td>
			<td width="360" align="left" valign="top">{{ $fielddata['colval'] }}</td>
		</tr>

	@endforeach

	<tr>
		<td colspan="2" align="left" valign="top"><p>{!! $maildata->content->body !!}</p></td>
	</tr>

@endsection

