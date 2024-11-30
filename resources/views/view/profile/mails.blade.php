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
                        <a class="btn btn-primary form-control" style="padding-top: 2% !important;padding-bottom: 115px !important;padding-left: 0px !important; padding-right:5% !important; margin: 10px !important;overflow:hidden !important">
                        <ul>
                        <li style="list-style-type: none;">
                            <h5 class="text-left"  style="overflow:hidden !important"><b>{{$message['from']}}</b></h5>
                            <p class="text-left"  style="overflow:hidden !important">{{$message['subject']}}</p>
                            <p class="text-left text-muted" style="overflow:hidden !important">{{substr($message['text_message'],0, 200)}}</p>
                        </li>
                        </ul>
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