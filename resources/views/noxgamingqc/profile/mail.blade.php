@extends('layouts.noxgamingqc.app')
@section('title', trans('general.mail'))
@section('content')

<input id="id" type="hidden" value="{{$mails->id}}">
<input id="replyType" type="hidden" value="">
<div class="row">
    <div class="col-md-12">
        <br />
        <br />
        <br />
        <br />
    </div>
    <div class="col-md-12">
        <br />
        <br />
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <h3 id="object" class="raleway-font" value="{{$mails->object}}"><b>{{$mails->object}}</b></h3>
                    <textarea id="objectEdit" class="form-control hidden" rows="1" style="font-size:24px;font-weight:bold;resize: none;">{{$mails->object}}</textarea>
                    <br />
                    <br />
                </div>
            </div>
        </div>
        @foreach($mailsContent as $key => $mail)
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
                                <a id="replyButton" class="btn btn-primary" href="#"><i class="fa fa-reply" area-hidden="true"></i></a>
                                <a id="replyAllButton" class="btn btn-primary" href="#"><i class="fa fa-reply-all" area-hidden="true"></i></a>
                                <a id="forwardButton" class="btn btn-primary" href="#"><i class="fa fa-share" area-hidden="true"></i></a>
                                <a id="cancelButton" class="btn btn-primary hidden" href="#"><i class="fa fa-times" area-hidden="true"></i></a>
                                <a id="deleteButton" class="btn btn-danger text-color" href="/{{app()->getLocale()}}/profile/mail/{{$mail->id}}/delete"><i class="fa fa-trash"></i></a>
                            </div>
                            <div class="col-md-12">
                                &nbsp
                                <p>{{Carbon\Carbon::parse($mail->created_at)->setTimezone('America/Toronto')->format('D Y-m-d H:i')}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            &nbsp
                            <textarea id="replyText" class="form-control hidden" rows="10" placeholder="{{trans('general.type_message_here')}}"></textarea>
                            &nbsp
                            <div class="text-right">
                                <input id="sendButton" type="button" class="btn btn-success hidden" value="{{trans('general.send')}}" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            &nbsp
                            &nbsp
                            @if($mail->html)
                                <iframe id="mailContent" src="/{{app()->getLocale()}}/profile/mail/{{$mail->id}}/content" style="overflow:visible;height:50vh;width:100%" height="100%" width="80%" frameborder="0" wmode="transparent">
                                <p style="text-danger">
                                    Sorry, we are unable to display your mails with your current browser.
                                </p>
                                </iframe>
                                &nbsp
                                &nbsp
                            @else
                                {{$mail->text}}
                                &nbsp
                                &nbsp
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script language="javascript">
    $(document).ready(function() {
        $('#replyButton').on('click', function() {
            $('#object').addClass('hidden');
            $('#objectEdit').removeClass('hidden');
            $('#replyText').removeClass('hidden');
            $('#deleteButton').addClass('hidden');
            $('#cancelButton').removeClass('hidden');
            $('#sendButton').removeClass('hidden');
            $('#objectEdit').html('RE:' + $('#object').attr('value'));
            $('#replyType').attr('value', 'reply');
        });
        $('#replyAllButton').on('click', function() {
            $('#object').addClass('hidden');
            $('#objectEdit').removeClass('hidden');
            $('#replyText').removeClass('hidden');
            $('#deleteButton').addClass('hidden');
            $('#cancelButton').removeClass('hidden');
            $('#sendButton').removeClass('hidden');
            $('#objectEdit').html('RE:' + $('#object').attr('value'));
            $('#replyType').attr('value', 'reply-all');
        });
        $('#forwardButton').on('click', function() {
            $('#object').addClass('hidden');
            $('#objectEdit').removeClass('hidden');
            $('#replyText').removeClass('hidden');
            $('#deleteButton').addClass('hidden');
            $('#cancelButton').removeClass('hidden');
            $('#sendButton').removeClass('hidden');
            $('#objectEdit').html('TR:' + $('#object').attr('value'));
            $('#replyType').attr('value', 'forward');
        });
        $('#cancelButton').on('click', function() {
            $('#object').removeClass('hidden');
            $('#objectEdit').addClass('hidden');
            $('#replyText').addClass('hidden');
            $('#deleteButton').removeClass('hidden');
            $('#cancelButton').addClass('hidden');
            $('#sendButton').addClass('hidden');
            $('#objectEdit').html($('#object').attr('value'));
            $('#replyType').attr('value', '');
        });
        $('#sendButton').on('click', function() {
            $.ajax({
                url: "/mail/send",
                method: 'POST',
                data: {
                    'id': $('#id').val(),
                    'type': $('#replyType').attr('value'),
                    'object': $('#objectEdit').val(),
                    'message' : $('#replyText').val(),
                },
                beforeSend: function() {
                    $('#sendButton').addClass('disabled');
                    $('#sendButton').attr('disabled', '');
                },
                success: function() {
                    toastr.success('Editing success', 'Email sent.')
                    $('#sendButton').removeClass('disabled');
                    $('#sendButton').removeAttr('disabled', '');
                    $('#object').removeClass('hidden');
                    $('#objectEdit').addClass('hidden');
                    $('#replyText').addClass('hidden');
                    $('#deleteButton').removeClass('hidden');
                    $('#cancelButton').addClass('hidden');
                    $('#sendButton').addClass('hidden');
                    $('#objectEdit').html($('#object').attr('value'));
                    $('#replyType').attr('value', '');
                },
                error: function (error) {
                    toastr.error('An error occured', 'An error occured while trying to send mail.')
                    $('#sendButton').removeClass('disabled');
                    $('#sendButton').removeAttr('disabled', '');
                    console.log(error);
                }
            });
        });
    });
</script>
@endsection