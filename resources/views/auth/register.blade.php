@extends('layouts.app')
@section('title', trans('general.register'))
@section('header', false)
@section('content')

<div class="row" style="margin-top:17%">
    <div class="container">
        <form class="form-horizontal" method="POST" action="{{ route('register', app()->getLocale()) }}">
            <div class="row">
                <div class="col-md-12">
                    <br />
                    <br />
                    <div class="col-md-3 text-center">
                        <img class="img" src="/img/logo.svg" width="40%" />
                        <h4 class="raleway-font">{{trans('auth.welcome')}}</h4>
                        <p class="raleway-font">{{trans('auth.welcome_info')}}</p>
                    </div>
                    <div class="col-md-9">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">{{trans('general.username')}}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">{{trans('general.email_address')}}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">{{trans('general.password')}}</label>
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="control-label">{{trans('general.confirm_password')}}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <br />
                    </div>
                    <div class="col-md-9 col-md-offset-3">
                        <div class="form-group">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">
                                    {{trans('general.register')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
