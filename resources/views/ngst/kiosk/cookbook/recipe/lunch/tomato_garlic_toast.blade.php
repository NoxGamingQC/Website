@extends('layouts.noxgamingqc.app')
@section('content')
@section('name', trans('cookbook.tomato_garlic_toast'))
@section('author', 'NoxGamingQC')
@section('yields', 'Donne 4 portions')
@section('prep_time', trans('cookbook.not_available'))
@section('cook_time', trans('cookbook.not_available'))
@section('description', trans('cookbook.not_available'))

<div class="container">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>Ingredients</h2>
            <br />
            <ul style="font-size:18px">
                <li>5 grosses tomates prunes, en dés</li>
                <li>2 c. à soupe de basilic frais, haché</li>
                <li>2 c. à soupe d'huile d'olive</li>
                <li>1/2 gousse d'ail, écrasée</li>
                <li>1 pincée de sel</li>
                <li>1 pincée de poivre</li>
                <li>8 tranches de pain</li>
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
                <li class="text-justify">Tous mélanger, sauf le pain.</li>
                <li class="text-justify">Recouvrir les pain avec 1/4 de la préparation (environ 3 c. à soupe).</li>
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