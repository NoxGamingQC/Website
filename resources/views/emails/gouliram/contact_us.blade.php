@extends('layouts.email.gouliram.app')
@section('brand', 'Gouliram productions')
@section('content')

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td class="em_blue em_font_22" align="center" valign="top">
            <h1 style="color:#000 !important">Un message requiert votre attention.</h1>
            <hr style="border-color:black"/>
        </td>
    </tr>
    <tr>
        <td valign="top" align="left">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
                <tr>
                    <td height="22" style="height:22px;" class="em_h20">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td height="8" style="height:8px; font-size:0px; line-height:0px;">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td class="em_grey em_center" align="left" valign="top" style="font-size: 16px; line-height: 24px; color:#000;">
                        De: {{$name}} @ {{$email}}
                        <br />
                        <br />
                        {{$message_content}}
                    </td>
                </tr>
                <tr>
                    <td height="16" style="height:16px; font-size:1px; line-height:1px;">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td height="26" style="height:26px;" class="em_h20">
                        &nbsp;
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
@endsection