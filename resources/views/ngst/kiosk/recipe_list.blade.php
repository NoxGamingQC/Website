@extends('layouts.noxgamingqc.app')
@section('content')
@section('title', trans('cookbook.title'))
@section('slogan', trans('cookbook.slogan'))

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br />
            @if(app()->getLocale() == 'fr-ca')
                <a href="/en-ca/kiosk/cookbook"><input class="btn btn-primary form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.english')}}" readonly></a>
            @elseif (app()->getLocale() == 'en-ca')
                <a href="/fr-ca/kiosk/cookbook"><input class="btn btn-primary form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.french')}}" readonly></a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 text-center">
            <h2>{{trans('cookbook.breakfast')}}</h2>
            <br />
            <ul class="no-decoration" style="font-size:24px; line-height: 2">
                <li><a class="text-color" href="/kiosk/recipe/crepes">{{trans('cookbook.crepes')}}</a></li>
                <li><a class="text-color" href="/kiosk/recipe/pancakes">{{trans('cookbook.pancakes')}}</a></li>
            </ul>
        </div>
        <div class="col-sm-4 text-center">
            <h2>{{trans('cookbook.lunch')}}</h2>
            <br />
            <ul class="no-decoration" style="font-size:24px;line-height: 2;">
            </ul>
        </div>
        <div class="col-sm-4 text-center">
            <h2>{{trans('cookbook.dessert')}}</h2>
            <br />
            <ul class="no-decoration" style="font-size:24px;line-height: 2;">
            </ul>
        </div>
    </div>
</div>

@endsection