@extends('layouts.noxgamingqc.app')
@section('content')
@section('name',trans('cookbook.macaroni_salad'))
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
                <li>200g à 250g de macaronis</li>
                <li>1/2 tasse d'échalotte hachée</li>
                <li>1/2 tasse de céleri hachée</li>
                <li>1/2 tasse de radis hachée</li>
                <li>4 c. à soupe de mayonnaise</li>
                <li>Sel et poivre au goût</li>
                <li>Thym au goût</li>
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
                <li class="text-justify">Faire cuire les macaronis.</li>
                <li class="text-justify">Bien égoutter et laisser refroidir.</li>
                <li class="text-justify">Hacher les légumes et mélanger avec les macaronis refroidis.</li>
                <li class="text-justify">Ajouter la mayonnaise.</li>
                <li class="text-justify">Ajouter le sel, le poivre et le thym.</li>
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