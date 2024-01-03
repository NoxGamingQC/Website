<div class="modal fade" id="sendMailModal" tabindex="-1" aria-labelledby="sendMailModal" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="sendMailLabel">{{trans('mail.send_message')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="error-text" aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="/mail/send" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('mail.sender')}}: </label>
                        <div class="col-sm-10">
                            <select class="selectpicker" id="sender" title="{{trans('mail.sender')}}">
                                @foreach($emailList as $key => $email)
                                    <option value="{{$email}}" {{($key == 0) ? 'selected' : ''}}>{{$email}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('mail.recipient')}}: </label>
                        <div class="col-sm-10">
                            <input id="recipient" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('mail.object')}}: </label>
                        <div class="col-sm-10">
                            <input id="object" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('mail.message')}}: </label>
                        <div class="col-sm-10">
                            <textarea id="message" type="text" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{trans('general.close')}}</button>
                    <button type="button" id="submitMail" class="btn btn-success">{{trans('general.send')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#submitMail').on('click', function() {
    $.ajax({
        url: "/mail/send",
        method: "post",
        data: {
            'sender': $('#sender').val(),
            'recipient': $('#recipient').val(),
            'object': $('#object').val(),
            'message': $('#message').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            $('#submitMail').addClass('disabled');
            $('#submitMail').attr('disabled', '');
        },
        success: function() {
            toastr.success('Mail has been sent successfully.', 'Mail sent');
            $('#submitMail').removeClass('disabled');
            $('#submitMail').removeAttr('disabled', '');
            window.location.reload();
        },
        error: function(error) {
            toastr.error('An error occured while trying to sent mail.', 'Error');
            $('#submitMail').removeClass('disabled');
            $('#submitMail').removeAttr('disabled', '');
        }
    });
});
</script>