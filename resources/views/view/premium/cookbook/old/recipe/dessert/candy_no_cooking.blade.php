@extends('layouts.noxgamingqc.app')
@section('content')
@section('name',trans('cookbook.candy_no_cooking'))
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
                <li>2 tasses de sucre</li>
                <li>1/2 tasse de cacao</li>
                <li>1/2 tasse de margarine</li>
                <li>1/2 tasse de lait</li>
                <li>3 tasses de gruau</li>
                <li>1/2 tasse de beurre d'arachide</li>
                
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
                <li class="text-justify">Cuire le sucre, le cacao, la margarine et le lait jusqu'à ébullition.</li>
                <li class="text-justify">Ajouter le gruau et le beurre d'arachide.</li>
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