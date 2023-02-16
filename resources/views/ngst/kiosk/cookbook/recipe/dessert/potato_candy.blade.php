@extends('layouts.noxgamingqc.app')
@section('content')
@section('name',trans('cookbook.potato_candy'))
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
                <li>1 pomme de terre</li>
                <li>Environ 8 tasses de sucre en poudre</li>
                <li>Environ 1 pot de beurre d'arachides</li>
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
                <li class="text-justify">Pilez 1 pomme de terre bouillie et mélangez-y du sucre en poudre jusqu'à ce que le sucre en ait absorbé toute l'humidité.</li>
                <li class="text-justify">Soupoudrez la table et étendez-y avec un rouleau à pâte, le mélange de pomme de terre et de sucre.</li>
                <li class="text-justify">Formez une abaisse très mince que vous enduirez ensuite d'une mince couche de beurre d'arachides.</li>
                <li class="text-justify">Enroulez ensuite l'abaisse du bout des doigts.</li>
                <li class="text-justify">Enveloppez cette longue tige dans du papier ciré et placez-la dans le réfrigérateur pendant 1 heure.</li>
                <li class="text-justify">Coupez-la en tranches d'un quart de pouce d'épaisseur pour formez des espèces de biscuits plats et ronds que vous disposerez sur une grande assiette.</li>
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