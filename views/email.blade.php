<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<style type="text/css">body, html {
			width: 100%;
			margin: 0;
			padding: 0;
			text-align: center;
			background-color: {{ $maildata->style->bgcolor }};
			color: {{ $maildata->style->textcolor }};
		}

		html, td {
			font-family: {{ $maildata->style->fontfam }};
			font-size: {{ $maildata->style->fontsize }};
		}</style>
</head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0"
      style="height: 100%; margin:0; padding:0; width:100%; background-color: {{ $maildata->style->bgcolor }};">
<center>
	<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%"
	       style="height:100%; margin:0; padding:0; width:100%; background-color: {{ $maildata->style->bgcolor }};">
		<tr>
			<td align="center" valign="top">

				<!-- PRE HEADER start -->
				<table width="600" border="0" cellspacing="2" cellpadding="0"
				       style="width:600px; background-color:{{ $maildata->style->bgcolor }}">
					<tr>
						<td align="center" valign="top">&nbsp;</td>
					</tr>
				</table>
				<!-- PRE HEADER end -->

			</td>
		</tr>
		<tr>
			<td align="center" valign="top">
				<!-- HEADER start -->
				<table width="600" border="0" cellspacing="20" cellpadding="0"
				       style="width:600px; background-color:{{ $maildata->style->headerBgColor }}">
					<tr>
						<td align="center" valign="top">
							<h1 style="color:{{ $maildata->style->headerColor }}">{{ $maildata->company->company_name }}</h1>
						</td>
					</tr>
				</table>
				<!-- HEADER end -->
			</td>
		</tr>
		<tr>
			<td align="center" valign="top">

				<!-- CONTENT WRAPPER start -->
				<table border="0" cellpadding="0" cellspacing="0" width="600"
				       style="width:600px; background-color:#fff">
					<tr>
						<td colspan="2" style="padding:20px;">

							<!-- CONTENT INNER start -->
							<table width="560" border="0" cellspacing="15" cellpadding="0" style="width:560px;">

								@yield('content')

							</table>
							<!-- CONTENT INNER end -->

						</td>
					</tr>
				</table>
				<!-- CONTENT WRAPPER end -->

			</td>
		</tr>
		<tr>
			<td align="center" valign="top">

				<!-- FOOTER start -->
				<table width="600" border="0" cellspacing="20" cellpadding="0"
				       style="width:600px; background-color:{{ $maildata->style->footerBgColor }}">
					<tr>
						<td align="center" valign="top" style="color:{{ $maildata->style->footerColor }}">
							{{ $maildata->company->company_name }} &bull; {{ $maildata->company->company_street }} {{ $maildata->company->company_street_nr }} &bull; {{ $maildata->company->company_pcode }} &bull; {{ $maildata->company->company_city }} &bull; {{ $maildata->company->company_telephone }}
						</td>
					</tr>
				</table>
				<!-- FOOTER end -->

			</td>
		</tr>
		<tr>
			<td align="center" valign="top">
				<!-- FOOTER BOTTOM start -->
				<table width="600" border="0" cellspacing="2" cellpadding="0"
				       style="width:600px; background-color:{{ $maildata->style->bgcolor }}">
					<tr>
						<td align="center" valign="top">&nbsp;</td>
					</tr>
				</table>
				<!-- FOOTER BOTTOM end -->
			</td>
		</tr>
	</table>
</center>
</body>
</html>
