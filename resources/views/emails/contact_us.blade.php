@extends('layouts.email')
@section('content')
    <span class="preheader">Someone have filled the form on our website.</span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">
            <table role="presentation" class="main">
              <tr>
                <td class="wrapper">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <h1>NoxGamingQC</h1>
                        <p>Hi there,</p>
                        <p>A message require your attention.</p>
                        <hr />
                        <p>Website language: {{$language}}</p>
                        <br />
                        <p>Name: {{$name}}</p>
                        <br />
                        <p>Email: {{$email}}</p>
                        <br />
                        <p>Object: {{$object}}</p>
                        <br />
                        <p>Message: {{$contactMessage}}</p>
                        <hr />
                        <p>Thanks you for using our services.</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
@stop