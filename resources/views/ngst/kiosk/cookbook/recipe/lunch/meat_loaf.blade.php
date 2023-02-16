@extends('layouts.noxgamingqc.app')
@section('content')
@section('name', trans('cookbook.meat_loaf'))
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
            <ul style="font-size:24px">
                <li>1 lbs de boeuf haché</li>
                <li>1 boîte de soupe aux légumes</li>
                <li>1 oignon</li>
                <li>1 oeuf</li>
                <li>Sel et poivre aux goûts</li>
                <li>1 tasse de biscuit soda écrasé</li>
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
                <li class="text-justify">Mélanger tous les ingrédients.</li>
                <li class="text-justify">Mettre dans un plat allant au four.</li>
                <li class="text-justify">Cuire à 350F environ 1 heure.</li>
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