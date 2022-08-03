@extends('layouts.app')

@section('content')
<div class="container">
    <form class="form-horizontal" method="POST" action="{{ route('login', app()->getLocale()) }}">
        <div class="row">
            <div class="col-md-12">
                <h3>{{trans('generic.login')}}</h3>
                <hr />
                <div class="col-md-3 text-center">
                <h4 class="raleway-font">{{trans('auth.welcome_back')}}</h4>
                <p class="raleway-font">{{trans('auth.welcome_back_message')}}</p>
                </div>
                <div class="col-md-9">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">{{trans('generic.email_address')}}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                    </div>
                    <br />
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">{{trans('generic.password')}}</label>
                        <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                    </div>
                </div>
            </div>
            <br />
            <div class="col-md-3 col-md-offset-3">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{trans('generic.remember_me')}}
                    </label>
                </div>
            </div>

            <div class="col-md-3">
                <a class="btn btn-link" href="{{ route('password.request', app()->getLocale()) }}">
                    {{trans('generic.forgot_password')}}
                </a>
            </div>
            <div class="col-md-3 text-right">
                <button type="submit" class="btn btn-primary">
                    {{trans('generic.login')}}
                </button>
            </div>
        </div>
        <br />
    </form>
</div>
@endsection
