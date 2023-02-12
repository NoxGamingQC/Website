@extends('layouts.noxgamingqc.app')
@section('content')
@section('title', trans('cookbook.meat_loaf'))

<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            <br />
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/lunch"><input class="btn btn-primary form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.go_back_to_last_page')}}" readonly></a>
        </div>
    </div>
</div>
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