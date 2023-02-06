@extends('layouts.noxgamingqc.app')
@section('content')
@section('title', trans('cookbook.title'))
@section('slogan', trans('cookbook.slogan'))

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br />
            <a href="/kiosk/cookbook"><input class="btn btn-primary form-control" href="/language/set/fr-ca" style="font-size:24px;padding:2%" value="{{trans('cookbook.french')}}" readonly></a>
            <!--<a href="/kiosk/cookbook"><input class="btn btn-primary form-control" href="/language/set/en-ca" style="font-size:24px;padding:2%" value="{{trans('cookbook.english')}}" readonly></a>-->
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 text-left">
            <h2>{{trans('cookbook.breakfast')}}</h2>
            <br />
            <ul style="font-size:24px">
                <li><a class="text-color" href="/company/kiosk/recipe/crepes">{{trans('cookbook.crepes')}}</a></li>
                <li><a class="text-color" href="/company/kiosk/recipe/pancakes">{{trans('cookbook.pancakes')}}</a></li>
            </ul>
        </div>
        <div class="col-md-4 text-left">
            <h2>{{trans('cookbook.lunch')}}</h2>
            <br />
            <ul style="font-size:24px">
                <li><a class="text-color" href="/company/kiosk/recipe/crepes">{{trans('cookbook.crepes')}}</a></li>
                <li><a class="text-color" href="/company/kiosk/recipe/pancakes">{{trans('cookbook.pancakes')}}</a></li>
            </ul>
        </div>
        <div class="col-md-4 text-left">
            <h2>{{trans('cookbook.dessert')}}</h2>
            <br />
            <ul style="font-size:24px">
                <li><a class="text-color" href="/company/kiosk/recipe/crepes">{{trans('cookbook.crepes')}}</a></li>
                <li><a class="text-color" href="/company/kiosk/recipe/pancakes">{{trans('cookbook.pancakes')}}</a></li>
            </ul>
        </div>
    </div>
</div>

@endsection