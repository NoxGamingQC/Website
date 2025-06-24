@extends('layouts.pages.error')
@section('title', 'ERROR 500')
@section('content')

<div class="container my-5">
    <div class="row text-center">
        <div class="col-12 py-5">
            <img src="/img/logo.png" width="300">
        </div>
        <div class="col-12 py-5 border-bottom">
            <h1 class="text-danger">ERROR 500</h1>
            <h3 class="raleway-font">Internal server error.</h3>
        </div>
        <div class="col-12 py-5">
            <h1 class="text-danger">ERREUR 500</h1>
            <h3 class="raleway-font">Erreur interne du serveur.</h3>
        </div>
    </div>
</div>
@include('layouts.components.footer')