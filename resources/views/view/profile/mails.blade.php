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
                @foreach($mails as $key => $message)
                    <div class="col-md-12">
                        <h4>{{$message['from']}}</h4>
                        <h5>{{$message['subject']}}<h5>
                        <p>{{substr($message['text_message'],0, 20)}}</p>
                    </div>
                    @endforeach
                @else
                <h2 class="text-center">You don't have mail</h2>
            @endif
        </div>
    </div>
</div>

@endsection