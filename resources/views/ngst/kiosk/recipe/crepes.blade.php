@extends('layouts.noxgamingqc.app')
@section('content')
@section('title','Crêpes')
@section('slogan', 'Fais 12-15 crêpes')

<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            <br />
            <a href="/{{app()->getLocale()}}/kiosk/cookbook"><input class="btn btn-primary form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.go_back_to_list')}}" readonly></a>
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
                <li>3 c. à soupe de sucre</li>
                <li>1 pincé de sel</li>
                <li>1 c. à soupe de beurre fondu</li>
                <li>1/2 c. à thé de vanille</li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark">
<div class="container bg-dark">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>Directives</h2>
            <br />
            <ul style="font-size:24px">
            </ul>
        </div>
        </div>
    </div>
</div>

@endsection