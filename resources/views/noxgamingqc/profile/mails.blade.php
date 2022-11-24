@extends('layouts.noxgamingqc.app')
@section('title', trans('general.mails'))
@section('header', false)
@section('content')

<div class="row">
    <div class="col-md-12 content-item bg-dark">
        <div class="container"> 
            @if(count($mails) > 0)
                <table class="table">
                    <tr>
                        <th>Sender</th>
                        <th>Object</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>View</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($mails as $key => $mail)
                        <tr>
                            <td>{{$mail->sender_name ? $mail->sender_name : $mail->sender}}</td>
                            <td>{{$mail->object}}</td>
                            <td style="text-overflow:ellipsis;overflow:hidden;white-space:nowrap;max-width:150px;">{{ $mail->text }}</td>
                            <td>{{$mail->created_at}}</td>
                            <td><a href="/{{app()->getLocale()}}/profile/mail/{{$mail->id}}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                            <td><a class="btn btn-danger text-white" href="/{{app()->getLocale()}}/profile/mail/{{$mail->id}}/delete"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                </table>
            @else
                <h2 class="text-center">You don't have mail</h2>
            @endif
        </div>
    </div>
</div>

@endsection