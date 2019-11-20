@extends('layouts.dev_welcome')
@section('title', 'Stream')
@section('content')
<h1>DEVELOPMENT MODE</h1>
<hr />
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">DEVELOPMENT MODE ENGAGED.</div>

                <div class="panel-body">
                    <h3>What to do</h3>
                    <hr />
                    <p>To access this website on this current state you must be logged in at all time and have the necessary right. If it's not your case don't worry the website should be back shortly. If you're one of the developement team member, want to help and don't have your credential make sure to ask NoxGamingQC in DM on Discord.</p>
                    <hr />
                    @guest
                        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                        <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                    @endguest
                    @auth
                        <a class="btn btn-primary disabled" href="#" disabled>Login</a>
                        <a class="btn btn-primary disabled" href="#" disabled>Register</a>
                        <hr />
                        P.S. Buttons are disabled, because we are detecting that your are already logged in. ¯\_(ツ)_/¯
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@stop
