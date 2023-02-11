@extends('layouts.noxgamingqc.app')
@section('content')
@section('title','Crêpes')
@section('slogan', 'Fais 12-15 crêpes')

<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            <br />
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/breakfast"><input class="btn btn-primary form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.go_back_to_last_page')}}" readonly></a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>Ingredients</h2>
            <br />
            <ul style="font-size:24px">
                <li>1 1/2 tasse de lait</li>
                <li>2 oeufs</li>
                <li>1 tasse de farine</li>
                <li>5 c. à soupe de sucre</li>
                <li>1 pincé de sel</li>
                <li>1 c. à soupe de beurre fondu</li>
                <li>1/2 c. à thé de vanille</li>
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
                <li class="text-justify">Dans un bol, mélanger la farine, le sucre et le sel. Ajouté les oeufs, 1/2 tasse de lait et la vanille, puis bien mélanger au fouet jusqu'à ce que la pâte sois lisse et homogène. Ajouter le reste du lait graduellement en remuant. Incorporer le beurre fondu.</li>
                <li class="text-justify">Chauffer une poêle à feu moyen. Lorsque la poêle est chaude, badigeonner de beurre.</li>
                <li class="text-justify">Pour chaques crêpes, verser environ 3 c. à soupe au centre de la poêle. Lorsque les bords se décolle facilement, retourner et poursuivre la cuisson pendant 10 secondes</li>
                <li class="text-justify text-warning">Attention - Chaques crêpes doivent être cuite dans le beurre.</li>
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