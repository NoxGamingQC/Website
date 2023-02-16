@extends('layouts.noxgamingqc.app')
@section('content')
@section('name',trans('cookbook.graham_cake'))
@section('author', trans('cookbook.my_grandma'))
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
                <li class="text-info no-decoration"><b><u>Gâteau</u></b></li>
                <li>2 c. à thé de beurre</li>
                <li>1 tasse de sucre</li>
                <li>1 oeuf</li>
                <li>1 tasse de lait</li>
                <li>2 tasses de biscuit graham émietté</li>
                <li>2 c. à thé de farine</li>
                <li>1 1/2 c. à thé de poudre à pâte</li>
                <li>1 pincé de sel</li>
                <br />
                <li class="text-info no-decoration"><b><u>Glaçage</u></b></li>
                <li>3/4 tasse de cassonnade</li>
                <li>2 à 3 c. à thé de lait</li>
                <li>1c. à thé de beurre</li>
                <li>1 tasse de sucre en poudre</li>
                
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
                <li class="text-info no-decoration"><b><u>Gâteau</u></b></li>
                <li class="text-justify">Battre le beurre, le sucre, l'oeuf et le lait au malaxeur à vitesse moyenne pendant 3 minutes</li>
                <li class="text-justify">Ajouté le reste des ingrédients.</li>
                <li class="text-justify">Cuire au four à 350F pendant 35 minutes dans un moule non graissé</li>
                <br />
                <li class="text-info no-decoration"><b><u>Glaçage</u></b></li>
                <li class="text-justify">Porter la cassonnade, le lait et le beurre à ébullition et enlever du feu.</li>
                <li class="text-justify">Ajouter le sucre en poudre.</li>
                <li class="text-justify">Passez a la mixette.</li>
                <li class="text-justify">Couvrir le gâteau.</li>
                <li class="text-justify text-warning">Ne pas attendre trop longtemps.</li>
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