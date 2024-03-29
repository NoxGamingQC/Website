@extends('layouts.pages.app')
@section('title', trans('general.mails'))
@section('slogan', "Currently in development. But don't worry you are still gonna receive your mail :P")
@section('content')
@include('modal.new_mail', ['emailList' => $emailList])

<div class="row">
    <div class="col-sm-12 content-item bg-dark">
        <div class="container"> 
            <div class="col-md-12 text-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sendMailModal"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{trans('mail.new_message')}}</button>
                <button type="button" class="btn btn-primary disabled" disabled><i class="fa fa-pencil" aria-hidden="true"></i> {{trans('mail.edit_signature')}}</button>
                <br />
                <br />
            </div>
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
                                    <p style="text-overflow:ellipsis;overflow:hidden;white-space:nowrap;max-width:80%;margin-bottom:1px;">{{ isset($mailContent[$mail->id]) ? $mailContent[$mail->id]->object : 'No object'}}</p>
                                    <p style="text-overflow:ellipsis;overflow:hidden;white-space:nowrap;max-width:80%;margin-bottom:1px;">{{  isset($mailContent[$mail->id]) ? $mailContent[$mail->id]->text : 'No message'}}</p>
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