@extends('layouts.error')
@section('title', 'ERROR 503')
@section('content')

<div class="row {{app('request')->input('app_type') !== 'mobile_app' ? 'error-background' : ''}}">
        <div class="container text-center">
            <img src="/img/logo.svg" width="300">
            <h3 class="raleway-font">ERROR 503 | In maintenance.</h3>
            <br />
            <hr />
            <br />
            <h3 class="raleway-font">ERREUR 503 | En maintenance.</h3>
        </div>
    </div>
</div>

@endsection
