@extends('layouts.noxgamingqc.app')
@section('content')
@section('title',trans('cookbook.simple_icing'))

<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            <br />
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/sauces_icing"><input class="btn btn-primary form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.go_back_to_last_page')}}" readonly></a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>Ingredients</h2>
            <br />
            <ul style="font-size:24px">
                <li>1 tasse de beurre</li>
                <li>1 1/2 tasse de sucre</li>
                <li>325ml de lait carnation</li>
                <li>2 c. à thé de vanille (facultatif)</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br />
            &nbsp
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>Directives</h2>
            <br />
            <ul style="font-size:24px">
                <li class="text-justify">Cuire sur le feu jusqu'à ébulition et faire épaissir (dans un très grand chaudron).</li>
                <li class="text-justify">Verser sur le gâteau une fois refroidi.</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br />
            &nbsp
        </div>
    </div>
</div>

@endsection