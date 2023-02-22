@extends('layouts.noxgamingqc.app')
@section('content')
@section('name', trans('cookbook.sauces'))
@section('slogan', trans('cookbook.slogan'))

<div class="container">
    <div class="row">
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/sauces/spaghetti_sauce"><input class="btn btn-primary form-control" style="font-size:18px;padding:15%" value="{{trans('cookbook.spaghetti_sauce')}}" readonly></a>
        </div>
    </div>
</div>

@endsection