@extends('layouts.reactLayout')
@section('title', 'Commands')
@section('content')
@guest
<input type="hidden" id="isUserLogged" value="false">
<input type="hidden" id="loginRoute" value="{{ route('login') }}">
<input type="hidden" id="registerRoute" value="{{ route('register') }}">
@else
<input type="hidden" id="isUserLogged" value="true">
<input type="hidden" id="username" value="{{ Auth::user()->name }}">
<input type="hidden" id="logoutRoute" value="{{ route('logout') }}">
@endguest
@stop
