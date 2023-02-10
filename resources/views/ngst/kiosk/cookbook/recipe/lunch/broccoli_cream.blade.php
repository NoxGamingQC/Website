@extends('layouts.noxgamingqc.app')
@section('content')
@section('title', trans('cookbook.broccoli_cream'))

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
                <li>3 tasses de bouillon de poulet</li>
                <li>1 paquet de brocoli</li>
                <li>1 oignon</li>
                <li>Sel et poivre au goût</li>
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
                <li class="text-justify">Cuire quelques minutes. Passez au blender.</li>
                <li class="text-justify">Au moment de servir, chauffer et ajouter 1/2 tasse de crème ou 1 tasse de lait. Servir chaud.</li>
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