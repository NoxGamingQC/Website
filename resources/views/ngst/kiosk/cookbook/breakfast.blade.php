@extends('layouts.noxgamingqc.app')
@section('content')
@section('name', trans('cookbook.breakfast'))
@section('slogan', trans('cookbook.slogan'))

<div class="container">
    <div class="row">
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/breakfast/crepes"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.crepes')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/breakfast/pancakes"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.pancakes')}}" readonly></a>
        </div>
    </div>
</div>

@endsection