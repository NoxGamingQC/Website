@extends('layouts.email')
@section('content')

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="em_full_wrap" align="center"  bgcolor="#efefef">
    <tr>
      <td align="center" valign="top"><table align="center" width="650" border="0" cellspacing="0" cellpadding="0" class="em_main_table" style="width:650px; table-layout:fixed;">
          <tr>
            <td align="center" valign="top" style="padding:0 25px;" class="em_aside10"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr>
                <td height="26" style="height:26px;" class="em_h20">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" valign="top"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://noxgamingqc.ca/img/NGST.png" width="150"  alt="NGST" border="0" style="display:block; font-family:Arial, sans-serif; font-size:18px; line-height:25px; text-align:center; color:#1d4685; font-weight:bold; max-width:208px;" class="em_w150" /></a></td>
              </tr>
              <tr>
                <td height="28" style="height:28px;" class="em_h20">&nbsp;</td>
              </tr>
            </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="em_full_wrap" align="center" bgcolor="#efefef">
    <tr>
      <td align="center" valign="top"><table align="center" width="650" border="0" cellspacing="0" cellpadding="0" class="em_main_table" style="width:650px; table-layout:fixed; background-color:#f8f8f8;">
          <tr>
            <td align="center" valign="top" style="padding:0 25px; background-color:#efefef;" bgcolor="#efefef" class="em_aside10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

              <tr>
                <td class="em_blue em_font_22" align="center" valign="top" style="font-family: Arial, sans-serif; font-size: 26px; line-height: 29px; color:#264780; font-weight:bold;">A message require your attention.</td>
              </tr>
              <tr>
                <td height="22" class="em_h20" style="height:22px; font-size:0px; line-height:0px;">&nbsp;</td>
              </tr>
              <tr>
              	<td valign="top" align="left" bgcolor="#ffffff" style="padding-left:25px; padding-right:35px; background-color:#ffffff;" class="em_aside10">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
                      <tr>
                        <td height="22" style="height:22px;" class="em_h20">&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="em_blue em_center" align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 20px; line-height: 24px; color:#264780; font-weight:bold;">{{$object}}</td>
                      </tr>
                      <tr>
                        <td height="8" style="height:8px; font-size:0px; line-height:0px;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td class="em_grey em_center" align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; color:#434343;">
                          From: {{$name}} @ {{$email}}
                          <br />
                          Language used on the website: {{$language}}
                          <hr />
                          {{$contactMessage}}
                        </td>
                      </tr>
                      <tr>
                        <td height="16" style="height:16px; font-size:1px; line-height:1px;">&nbsp;</td>
                      </tr>

                      <tr>
                        <td align="left" valign="top">
                        <table width="140" border="0" cellspacing="0" cellpadding="0" align="left" style="width:140px;" class="em_wrapper">
                          <tr>
                            <td valign="top" align="center">
                            	<table width="140" style="width:140px; background-color:#6bafb2; border-radius:4px;" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#6bafb2">
                          <tr>
                            <td class="em_white" height="34" align="center" valign="middle" style="font-family: Arial, sans-serif; font-size: 13px; color:#ffffff; font-weight:bold; height:34px;"><a href="https://www.mailgun.com" target="_blank" style="text-decoration:none; color:#ffffff; line-height:34px; display:block;">CHECK IT OUT</a></td>
                          </tr>
                        </table>
                            </td>
                          </tr>
                        </table>
                        </td>
                      </tr>
                      <tr>
                        <td height="26" style="height:26px;" class="em_h20">&nbsp;</td>
                      </tr>
                    </table>
                </td>
              </tr>

            </table>
            </td>
          </tr>
      </td>
    </tr>
</table>
@stop