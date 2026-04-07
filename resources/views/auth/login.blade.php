@extends('layouts.app')
@section('title', trans('general.login'))
@section('content')

    <div class="container">
        <form class="form-horizontal">
        <input type="hidden" id="previousPath" value="{{$previousPath}}">
            <div class="row card">
                <div class="col-12">
                    <br />
                    <br />
                    <div class="row">
                        <div class="col-3 text-center">
                            <img class="img" src="/img/logo.svg" width="40%" />
                            <h4 class="raleway-font">{{trans('auth.welcome_back')}}</h4>
                            <p class="raleway-font">{{trans('auth.welcome_back_message')}}</p>
                        </div>
                        <div class="col-9">
                            <div id="invalidCredentials" class="alert alert-danger hidden" role="alert" hidden>
                                <span style="color:#252525">{{trans('auth.failed')}}</span>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <div class="custom-input-group mb-3">
                                        <span class="text-black icon-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="{{ trans('auth.name') }}" required autofocus>
                                    </div>
                            </div>
                            <br />
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="custom-input-group mb-3">
                                    <span class="text-black icon-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="{{ trans('general.password') }}" required>
                                </div>
                                <span class="text-warning">{{trans('auth.credentials_case_sensitive')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-3 offset-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}> <span class="form-check-label">{{trans('general.remember_me')}}</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-link" href="{{ route('password.request', app()->getLocale()) }}">
                            {{trans('general.forgot_password')}}
                        </a>
                    </div>
                    <div class="col-3 text-end">
                        <button id="submit" type="button" class="btn btn-primary">
                            {{trans('general.login')}}
                        </button>
                    </div>
                </div>
            </div>
            <br />
        </form>
    </div>
<script>
    document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13) {
            submitLogin();
        }
    }

    $('#submit').on('click', function() {
        submitLogin();
    });

    function submitLogin() {
        $.ajax({
            url:  '/' + $('html').attr('lang') + "/login",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: {
                name: $('#name').val(),
                password: $('#password').val(),
                remember: $('#remember').is(':checked'),
                previousPath: $('#previousPath').val()
            },
            beforeSend: function() {
                $('#submit').html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
                $('#submit').addClass('disabled');
                $('#submit').attr('disabled', true);
            },
            success: function (response) {
                window.location.href = response.redirectTo
            },
            error: function (xhr, ajaxOptions, thrownError) {
                if(xhr.responseJSON.message == 'invalid-credentials'); {
                    $('#invalidCredentials').removeClass('hidden');
                    $('#invalidCredentials').attr('hidden', false);
                }
            },
            complete: function() {
                $('#submit').html('{{trans('general.login')}}');
                $('#submit').removeClass('disabled');
                $('#submit').attr('disabled', false);
            }
        });
    }
</script>
@endsection
