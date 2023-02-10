@extends('layouts.noxgamingqc.app')
@section('content')
@section('title','Kamikaze')

<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            <br />
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/drinks"><input class="btn btn-primary form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.go_back_to_list')}}" readonly></a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-left">
            <h2>Ingredients</h2>
            <br />
            <ul style="font-size:24px">
                <li>3oz Vodka</li>
                <li>3oz curacao bleu ou de triple sec</li>
                <li>2oz de jus de lime ou de citron</li>
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
                <li>Servir dans un verre à Martini</li>
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