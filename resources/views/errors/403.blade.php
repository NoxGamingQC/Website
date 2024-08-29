@extends('layouts.pages.error')
@section('title', 'ERROR 403')
@section('content')

<div class="container">
    <div class="row text-center">
        <img src="/img/logo.png" width="300">
         <h1 class="text-danger">ERROR 403</h1>
        <h3 class="raleway-font">Access forbidden.</h3>
        <br />
        <hr />
        <br />
        <h1 class="text-danger">ERREUR 403</h1>
        <h3 class="raleway-font">Accès non authorisé.</h3>
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