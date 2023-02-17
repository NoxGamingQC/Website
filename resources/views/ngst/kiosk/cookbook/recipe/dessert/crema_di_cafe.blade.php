@extends('layouts.noxgamingqc.app')
@section('content')
@section('name', trans('cookbook.crema_di_cafe'))
@section('author', 'NoxGamingQC')
@section('prep_time', trans('cookbook.not_available'))
@section('cook_time', trans('cookbook.not_available'))
@section('yields', trans('cookbook.not_available'))
@section('description', trans('cookbook.not_available'))

<div class="container">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>Ingredients</h2>
            <br />
            <ul style="font-size:18px">
                <li>4 c. à soupe de café instant</li>
                <li>1/2 tasse de sucre</li>
                <li>1/2 tasse d'eau très froide</li>

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
            <ul style="font-size:18px">
                <li class="text-justify">Ajouter tout les ingrédients dans un grand bol.</li>
                <li class="text-justify">Battre de 5 à 10 minutes à la mixette ou jusqu'à l'obtention d'une mousse.</li>
                <li class="text-justify">Servir.</li>

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