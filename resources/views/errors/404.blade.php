@extends('layouts.noxgamingqc.app')
@section('title', 'ERROR 404')
@section('slogan', 'Sorry bud, but are you lost? The page you requested does not exist.')
@section('content')


<div class="row">
    <div class="col-md-12 bg-dark content-item">
        <div class="container">
            <h3 class="raleway-font text-danger">ERROR 404 - PAGE NOT FOUND</h3>
            <p class="raleway-font text-danger">The page you are requesting doesn't exist? Check the route on top of the browser. Did you do a typo? Is it an old link try to use the navigation tab on top instead it might help.</p>
        </div>
    </div>
</div>

@endsection