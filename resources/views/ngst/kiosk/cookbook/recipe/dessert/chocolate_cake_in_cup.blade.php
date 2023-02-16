@extends('layouts.noxgamingqc.app')
@section('content')
@section('title',trans('cookbook.chocolate_cake_in_cup'))
@section('slogan', '1 portion')

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
                <li>3 c. à soupe de farine</li>
                <li>2 c. à soupe de cassonade</li>
                <li>2 c. à thé de cacao</li>
                <li>1/4 c. à thé de poudre à pâte</li>
                <li>3 c. à soupe de lait</li>
                <li>1 c. à soupe d'huile</li>
                <li>10 pépites de chocolat</li>
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
                <li class="text-justify">Mélangez jusqu'à homogénité.</li>
                <li class="text-justify">Cuire 45 secondes au micro-ondes.</li>
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