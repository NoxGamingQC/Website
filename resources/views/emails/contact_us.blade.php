@extends('layouts.email.app')
@section('brand', 'NoxGamingQC')
@section('content')

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td class="em_blue em_font_22" align="center" valign="top">
            <h1>A message require your attention.</h1>
            <hr />
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
                    <td align="left" valign="top">
                        <h2>{{$object}}</h2>
                    </td>
                </tr>
                <tr>
                    <td height="8" style="height:8px; font-size:0px; line-height:0px;">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td class="em_grey em_center" align="left" valign="top" style="font-size: 16px; line-height: 24px; color:#fff;">
                        From: {{$name}} @ {{$email}}
                        <br />
                        <br />
                        {{$contactMessage}}
                    </td>
                </tr>
                <tr>
                    <td height="16" style="height:16px; font-size:1px; line-height:1px;">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="top">
                        <table width="140" border="0" cellspacing="0" cellpadding="0" align="left" style="width:140px;" class="em_wrapper">
                            <tr>
                                <td valign="top" align="center">
                                    <table width="140" style="width:140px; border="0" cellspacing="0" cellpadding="0" align="center">
                                        <tr>
                                            <td class="em_white" height="34" align="center" valign="middle" style="font-size: 13px; color:#ffffff; font-weight:bold; height:34px;">
                                                <a class="button">
                                                    CHECK IT OUT
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
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