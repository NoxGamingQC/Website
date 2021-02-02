@extends('layouts.dev_welcome')
@section('title', 'Stream')
@section('content')
<h1>On maintenance. / En maintenance.</h1>
<hr />
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">On maintenance / En maintenance</div>

                <div class="panel-body">
                    <h3>Sorry / Désolé</h3>

                    <p>Something went wrong and we decided to put the website on mainteance for a short time. Thanks for your patience. We should be back soon.</p>
                    <br />
                    <p>Nous avons encontré une erreur et nous avons décidé de mettre le site web en maintence. Merci de votre patience. Nous seront de retour bientôt.</p>
                    <br />
                    @guest
                        <em>P.S. Only members with developpers rights have access the website at the moment.</em>
                        <br />
                        <em>P.S. Seul les membres ayant les droits développeur ont accès au site web pour le moment.</em>
                        <br />
                        <br />
                        <a class="btn btn-primary" href="{{ route('login', app()->getLocale()) }}">Login / Se connecter</a>
                        <a class="btn btn-primary" href="{{ route('register', app()->getLocale()) }}">Register / S'inscrire</a>

                    @endguest
                    @auth
                        <a class="btn btn-primary disabled" href="#" disabled>Login / Se connecter (dev only)</a>
                        <a class="btn btn-primary disabled" href="#" disabled>Register / S'inscrire</a>
                        <hr />
                        P.S. Buttons are disabled, because we are detecting that your are already logged in. ¯\_(ツ)_/¯ <a href="/{{app()->getLocale()}}/home">(Travel to home page)</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@stop
