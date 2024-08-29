@extends('layouts.pages.error')
@section('title', 'ERROR 405')
@section('content')

<div class="container">
    <div class="row text-center">
        <img src="/img/logo.png" width="300">
        <h1 class="text-danger">ERROR 405</h1>
        <h3 class="raleway-font">Method not allowed.</h3>
        <br />
        <hr />
        <br />
        <h1 class="text-danger">ERREUR 405</h1>
        <h3 class="raleway-font">Méthode non authorisé.</h3>
    </div>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
@include('layouts.components.footer')