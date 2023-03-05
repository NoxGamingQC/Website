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
                                <a id="replyButton{{$mail->id}}" data-id="{{$mail->id}}" class="btn btn-primary reply-button" href="#"><i class="fa fa-reply" area-hidden="true"></i></a>
                                <a id="replyAllButton{{$mail->id}}" data-id="{{$mail->id}}" class="btn btn-primary reply-all-button" href="#"><i class="fa fa-reply-all" area-hidden="true"></i></a>
                                <a id="forwardButton{{$mail->id}}" data-id="{{$mail->id}}" class="btn btn-primary forward-button" href="#"><i class="fa fa-share" area-hidden="true"></i></a>
                                <a id="cancelButton{{$mail->id}}" data-id="{{$mail->id}}" class="btn btn-primary hidden cancel-button" href="#"><i class="fa fa-times" area-hidden="true"></i></a>
                            </div>
                            <div class="col-md-12">
                                &nbsp
                                <p>{{Carbon\Carbon::parse($mail->created_at)->setTimezone('America/Toronto')->format('D Y-m-d H:i')}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            &nbsp
                            <textarea id="replyText{{$mail->id}}" class="form-control hidden" rows="10" placeholder="{{trans('general.type_message_here')}}"></textarea>
                            &nbsp
                            <div class="text-right">
                                <input id="{{$mail->id}}" type="button" class="btn btn-success send-button hidden" value="{{trans('general.send')}}" />
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
        $('.reply-button').on('click', function() {
            var id = $(this).attr('data-id');
            $('#object').addClass('hidden');
            $('#objectEdit').removeClass('hidden');
            $('#replyText' + id).removeClass('hidden');
            $('#deleteButton' + id).addClass('hidden');
            $('#cancelButton' + id).removeClass('hidden');
            $('#' + id).removeClass('hidden');
            $('#objectEdit').html('RE:' + $('#object').attr('value'));
            $('#replyType').attr('value', 'reply');
        });
        $('.reply-all-button').on('click', function() {
            var id = $(this).attr('data-id');
            $('#object').addClass('hidden');
            $('#objectEdit').removeClass('hidden');
            $('#replyText' + id).removeClass('hidden');
            $('#deleteButton' + id).addClass('hidden');
            $('#cancelButton' + id).removeClass('hidden');
            $('#' + id).removeClass('hidden');
            $('#objectEdit').html('RE:' + $('#object').attr('value'));
            $('#replyType').attr('value', 'reply-all');
        });
        $('.forward-button').on('click', function() {
            var id = $(this).attr('data-id');
            $('#object').addClass('hidden');
            $('#objectEdit').removeClass('hidden');
            $('#replyText' + id).removeClass('hidden');
            $('#deleteButton' + id).addClass('hidden');
            $('#cancelButton' + id).removeClass('hidden');
            $('#' + id).removeClass('hidden');
            $('#objectEdit').html('TR:' + $('#object').attr('value'));
            $('#replyType').attr('value', 'forward');
        });
        $('.cancel-button').on('click', function() {
            var id = $(this).attr('data-id');
            $('#object').removeClass('hidden');
            $('#objectEdit').addClass('hidden');
            $('#replyText' + id).addClass('hidden');
            $('#deleteButton' + id).removeClass('hidden');
            $('#cancelButton' + id).addClass('hidden');
            $('#' + id).addClass('hidden');
            $('#objectEdit').html($('#object').attr('value'));
            $('#replyType').attr('value', '');
        });
        $('.send-button').on('click', function() {
            var id = this.attr('id');
            $.ajax({
                url: "/mail/send",
                method: 'POST',
                data: {
                    'id': id,
                    'type': $('#replyType').attr('value'),
                    'object': $('#objectEdit').val(),
                    'message' : $('#replyText' + id).val(),
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