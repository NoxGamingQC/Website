@extends('layouts.pages.error')
@section('title', 'ERROR 500')
@section('content')

<div class="container">
    <div class="row text-center">
        <img src="/img/logo.png" width="300">
        <h1 class="text-danger">ERROR 500</h1>
        <h3 class="raleway-font">Internal server error.</h3>
        <br />
        <hr />
        <br />
        <h1 class="text-danger">ERREUR 500</h1>
        <h3 class="raleway-font">Erreur interne du serveur.</h3>
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

@endsection
