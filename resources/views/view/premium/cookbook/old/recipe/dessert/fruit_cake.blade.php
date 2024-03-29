@extends('layouts.noxgamingqc.app')
@section('content')
@section('name',trans('cookbook.fruit_cake'))
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
                <li>19oz de salade de fruit (1 grosse canne avec le jus)</li>
                <li>2 oeufs</li>
                <li>1 1/2 tasse de sucre</li>
                <li>2 tasses de farine</li>
                <li>2 c. à soupe de soda</li>
                <li>2 c. à thé de poudre à pâte</li>
                <li>1 pincée de sel</li>
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
                <li class="text-justify">Dans un plat en pyrex couvrir le fond de beurre.</li>
                <li class="text-justify">Déposer le mélange dans le plat.</li>
                <li class="text-justify">Cuire au four à 325C pendant 50 minutes</li>
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