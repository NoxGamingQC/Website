@extends('layouts.noxgamingqc.app')
@section('title', trans('general.mail'))
@section('slogan', $mail->object)
@section('header', false)
@section('content')

<div class="row">
    <div class="col-md-12 content-item bg-dark">
        <div class="container">
            <div class="col-md-6">
                <p>Sender name: {{$mail->sender_name}}</p>
                <p>Email: {{$mail->sender}}</p>
                <p>Received on: {{$mail->created_at}}</p>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-danger" href="/{{app()->getLocale()}}/profile/mail/{{$mail->id}}/delete"><i class="fa fa-trash"></i></a>
                <a class="btn btn-primary" href="/{{app()->getLocale()}}/profile/mail">Go back</a>
            </div>
            <div class="col-md-12">
                <hr />
                <h2>{{$mail->object}}</h2>
                <p class="text-justify">{!! $mail->message !!}</p>
            </div>
        </div>
    </div>
</div>

@endsection