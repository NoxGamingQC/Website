@extends('layouts.noxgamingqc.app')
@section('content')
@section('title', trans('cookbook.spagetti_sauce'))

<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            <br />
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/sauces_icing"><input class="btn btn-primary form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.go_back_to_last_page')}}" readonly></a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>Ingredients</h2>
            <br />
            <ul style="font-size:24px">
                <li>3 petites tasses d'oignons</li>
                <li>6 branches de céleri</li>
                <li>1 tasse de margarine</li>
                <li>10 lbs de boeuf haché</li>
                <li>1 boîte de tomates broyé</li>
                <li>1 boîte de soupe aux tomates</li>
                <li>1 boîte de tomates au "Past"</li>
                <li>c. à soupe de sel</li>
                <li>Feuille de laurier</li>
                <li>c. à soupe de poivre</li>
                <li>c. à soupe de sucre</li>
                <li>c. à soupe de piment broyé</li>
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
               <li class="text-justify">N/A</li>
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