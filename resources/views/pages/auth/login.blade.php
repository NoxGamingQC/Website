@extends('layouts.app')
@section('title', trans('general.login'))
@section('content')

    <div class="container">
        <form class="form-horizontal">
        <input type="hidden" id="previousPath" value="{{$previousPath}}">
            <div class="row">
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
                            {{ csrf_field() }}
                            <div id="invalidCredentials" class="alert alert-danger hidden" role="alert" hidden>
                                <span style="color:#252525">{{trans('auth.failed')}}</span>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">{{trans('auth.name')}}</label>
                                    <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                            <br />
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">{{trans('general.password')}}</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                <span class="text-body-secondary">{{trans('auth.credentials_case_sensitive')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <div class="col-3 offset-3">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}> {{trans('general.remember_me')}}
                        </label>
                    </div>
                </div>

                <div class="col-3">
                    <a class="btn btn-link" href="{{ route('password.request', app()->getLocale()) }}">
                        {{trans('general.forgot_password')}}
                    </a>
                </div>
                <div class="col-3 text-right">
                    <button id="submit" type="button" class="btn btn-primary">
                        {{trans('general.login')}}
                    </button>
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
