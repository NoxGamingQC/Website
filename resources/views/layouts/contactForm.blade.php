<div class="row">
    <div class="col-md-6 text-center">
        <div style="margin:5%;margin-top: 15%">
            <h5 class="raleway-font"><a class="text-color" href="mailto:nox@noxgamingqc.ca">jbedard@noxgamingqc.ca</a></h5>
            <h5 class="raleway-font"><a class="text-color" href="tel:819-852-8705">819-852-8705</a></h5>
            <br />
            <p>
                @include('layouts.socials')
            </p>
        </div>
    </div>
    <div class="col-md-6">
    <form class="form-horizontal" action="/contact" method="post">
            <div class="form-group">
                <label class="control-label">{{trans('contact.name')}} <i class="text-danger">*</i> </label>
                <input id="contactName" type="text" class="form-control" placeholder="{{trans('contact.enter_name')}}">
            </div>
            <div class="form-group">
                <label class="control-label">{{trans('contact.email')}} <i class="text-danger">*</i> </label>
                <input id="contactEmail" type="text" class="form-control" placeholder="{{trans('contact.enter_email')}}">
                <p id="contactEmailNotValid" class="text-danger hidden" hidden> Please enter a valid email address</p>
            </div>
            <div class="form-group">
                <label class="control-label">{{trans('contact.object')}} </label>
                <input id="contactObject" type="text" class="form-control" placeholder="{{trans('contact.enter_object')}}">
            </div>
            <div class="form-group">
                <label class="control-label">{{trans('contact.message')}} <i class="text-danger">*</i> </label>
                <textarea id="contactMessage" type="text" class="form-control" rows="4" placeholder="{{trans('contact.enter_message')}}"></textarea>
            </div>
            <div>
                {{trans('contact.required')}}<i class="text-danger">*</i>
            </div>
            <div class="text-center">
                <button type="button" id="submitContactForm" class="btn btn-success">{{trans('generic.send')}}</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">

$(document).ready(function() {

    function Validate() {
        var emailAddress = $('#contactEmail').val();
        var emailRGEX = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        return emailRGEX.test(emailAddress);
    }

    $('#submitContactForm').click(function() {
        if(Validate()) {
            $('#contactEmailNotValid').addClass('hidden');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/'+ $('html[lang]').attr('lang') +'/contact/form',
                method: 'POST',
                data: {
                    'name': $('#contactName').val(),
                    'email': $('#contactEmail').val(),
                    'object': $('#contactObject').val(),
                    'message': $('#contactMessage').val()
                },
                beforeSend: function() {
                    $('#submitContactForm').addClass('disabled');
                    $('#submitContactForm').attr('disabled', '');
                },
                success: function() {
                    toastr.success('Message sent', 'Your message as been sent successfully.')
                    $('#submitContactForm').removeClass('disabled');
                    $('#submitContactForm').removeAttr('disabled', '');
                },
                error: function (error) {
                    toastr.error('An error occured', 'An error occured while trying to send your message.')
                    $('#submitContactForm').removeClass('disabled');
                    $('#submitContactForm').removeAttr('disabled', '');
                    console.log(error);
                }
            })
        } else {
            $('#contactEmailNotValid').removeClass('hidden');
            $('#contactEmailNotValid').removeAttr('hidden');
        }
    });
});
</script>