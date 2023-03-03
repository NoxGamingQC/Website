@extends('layouts.noxgamingqc.app')
@section('title', trans('general.mail'))
@section('slogan', $mail->object)
@section('header', false)
@section('content')

<div class="row">
    <div class="col-md-12 content-item bg-dark">
        <div class="container">
            <div class="col-md-6">
                <p><b><u>Sender name:</u></b> {{$mail->sender_name}}</p>
                <p><b><u>From:</u></b> {{$mail->sender}}</p>
                <p><b><u>To:</u></b> {{$mail->recipient}}</p>
                <p><b><u>Received on:</u></b> {{Carbon\Carbon::parse($mail->created_at)->format('Y-m-d')}}</p>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-primary" href="/{{app()->getLocale()}}/profile/mail"><i class="fa fa-reply" area-hidden="true"></i></a>
                <a class="btn btn-danger text-color" href="/{{app()->getLocale()}}/profile/mail/{{$mail->id}}/delete"><i class="fa fa-trash"></i></a>
                <a class="btn btn-primary" href="/{{app()->getLocale()}}/profile/mail">Go back</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3 class="raleway-font text-center"><u>{{$mail->object}}</u></h3>
        <br />
        @if($mail->html)
            <iframe id="mailContent" src="/{{app()->getLocale()}}/profile/mail/{{$mail->id}}/content"   style="overflow:visible;height:100%;width:100%" height="100%" width="100%" frameborder="0" wmode="transparent">
            <p style="text-danger">
                Sorry, we are unable to display your mails with your current browser.
            </p>
            </iframe>
        @else
            {{$mail->text}}
        @endif
    </div>
</div>
<script language="javascript">
    function autoResizeDiv()
    {
        document.getElementById('mailContent').style.height = window.innerHeight +'px';
    }
    window.onresize = autoResizeDiv;
    autoResizeDiv();
</script>
@endsection