@extends('layouts.noxgamingqc.app')
@section('title', trans('general.mails'))
@section('slogan', "Currently in development. But don't worry you are still gonna receive your mail :P")
@section('content')

<div class="row">
    <div class="col-sm-12 content-item bg-dark">
        <div class="container"> 
            @if(count($mails) > 0)
                @foreach($mails as $key => $mail)
                    <div class="col-md-12">
                        <a href="/{{app()->getLocale()}}/profile/mail/{{$mail->id}}" class="mail-container text-color">
                            <div class="row" style="padding-top: 3%;padding-bottom: 3%">
                                <div class="col-md-6" style="text-overflow:ellipsis;overflow:hidden;white-space:nowrap;max-width:70%">
                                    <span>{{explode(';', $mail->participants)[0]}}</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <span>{{Carbon\Carbon::parse($mail->created_at)->format('M d')}}</span>
                                </div>
                                <div class="col-md-12">
                                    <p style="text-overflow:ellipsis;overflow:hidden;white-space:nowrap;max-width:80%;margin-bottom:1px;">{{ $mailContent[$mail->id]->object }}</p>
                                    <p style="text-overflow:ellipsis;overflow:hidden;white-space:nowrap;max-width:80%;margin-bottom:1px;">{{ $mailContent[$mail->id]->text }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @else
                <h2 class="text-center">You don't have mail</h2>
            @endif
        </div>
    </div>
</div>

@endsection