@extends('layouts.noxgamingqc.app')
@section('content')
@section('title', trans('cookbook.sugar_cone'))
@section('slogan', 'Donne 65 cornets')

<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            <br />
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/dessert"><input class="btn btn-primary form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.go_back_to_last_page')}}" readonly></a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>Ingredients</h2>
            <br />
            <ul style="font-size:24px">
                <li>1/2 lbs de beurre</li>
                <li>2 tasse de cassonnade</li>
                <li>1/2 tasse de sirop d'érable</li>
                <li>300ml de lait condensé sucré (Eagle Brand)</li>
                <li>1 tasse de guimauve</li>
                <li>Cornets</li>
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
            <li class="text-justify">Faire fondre 1/2 lbs de beurre au micro-onde.</li>
            <li class="text-justify">Ajouter la cassonnade, le sirop d'érable, 1 boite eagle brand</li>
            <li class="text-justify">Faire cuire 7 minutes au micro-onde et brasser toutes les 2 minutes</li>
            <li class="text-justify">Ajouter les guimauves et tourné 1 minute</li>
            <li class="text-justify">Remplir les cornets</li>
            <li class="text-justify">Peut être conservé au réfrigérateur ou au congelateur.</li>
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