@extends('layouts.noxgamingqc.app')
@section('title', trans('general.mail'))
@section('header', false)
@section('content')

<div class="row">
    <div class="col-md-12">
        <br />
        <br />
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <h3 class="raleway-font"><b>{{$mail->object}}</b></h3>
                    <br />
                    <br />
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-2">
                                <img class="img-circle" src="/img/no-avatar.jpg" width="100%">
                            </div>
                            <div class="col-md-10">
                                <h4 class="raleway-font" style="overflow:visible">{{$mail->sender_name}} &lt;{{$mail->sender}}&gt;</h4>
                                <p>À : {{$mail->recipient}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-right">
                        <div class="col-md-12">
                            <a class="btn btn-primary" href="#"><i class="fa fa-reply" area-hidden="true"></i></a>
                            <a class="btn btn-primary" href="#"><i class="fa fa-reply-all" area-hidden="true"></i></a>
                            <a class="btn btn-primary" href="#"><i class="fa fa-share" area-hidden="true"></i></a>
                            <a class="btn btn-danger text-color" href="/{{app()->getLocale()}}/profile/mail/{{$mail->id}}/delete"><i class="fa fa-trash"></i></a>
                        </div>
                        <div class="col-md-12">
                            &nbsp
                            <p>{{Carbon\Carbon::parse($mail->created_at)->setTimezone('America/Toronto')->format('D Y-m-d H:i')}}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        &nbsp
                        &nbsp
                        @if($mail->html)
                            <iframe id="mailContent" src="/{{app()->getLocale()}}/profile/mail/{{$mail->id}}/content" style="overflow:visible;height:100%;width:100%" height="100%" width="80%" frameborder="0" wmode="transparent">
                            <p style="text-danger">
                                Sorry, we are unable to display your mails with your current browser.
                            </p>
                            </iframe>
                        @else
                            {{$mail->text}}
                        @endif
                    </div>
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>
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