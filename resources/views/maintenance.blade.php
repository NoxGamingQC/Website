@extends('layouts.maintenance')
@section('title', 'Maintenance')
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
                    <em>P.S. Only members with developpers rights have access the website at the moment.</em>
                    <br />
                    <em>P.S. Seul les membres ayant les droits développeur ont accès au site web pour le moment.</em>
                    <br />
                    @guest
                        <br />
                        <a class="btn btn-primary" href="{{ route('login', app()->getLocale()) }}">Login / Se connecter</a>
                        <a class="btn btn-primary" href="{{ route('register', app()->getLocale()) }}">Register / S'inscrire</a>

                    @endguest
                    @auth
                        <hr />
                       <p>¯\_(ツ)_/¯ You are logged in. If you still can't access the website take a minute and read the whole message. If you haven't been redirected to the welcome page there's a link: <a href="/{{app()->getLocale()}}/home">(Travel to home page)</a></p>
                       <br />
                       <p>¯\_(ツ)_/¯ Vous êtes connecter. Si vous n'avez pas accès au site web, prenez quelques minutes pour lire le message ci-haut. Si vous n'avez pas été redirigé, voici un lien vers la page d'accueil: <a href="/{{app()->getLocale()}}/home">(Allez vers la page d'accueil)</a></p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@stop
