@extends('layouts.noxgamingqc.app')
@section('content')
@section('title', trans('cookbook.sauces_icing'))
@section('slogan', trans('cookbook.slogan'))

<div class="container">
    <div class="row">
        <div class="col-md-12 text-right">
            <br />
            <a href="/{{app()->getLocale()}}/kiosk/cookbook"><input class="btn btn-primary form-control" style="font-size:24px;padding:5%" value="{{trans('cookbook.go_back_to_last_page')}}" readonly></a>
            <br />
            &nbsp
            <br />
            &nbsp
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/sauces_icing/simple_icing"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.simple_icing')}}" readonly></a>
        </div>
        <div class="col-sm-4 text-center" style="margin-bottom:3%">
            <a href="/{{app()->getLocale()}}/kiosk/cookbook/sauces_icing/spagetti_sauce"><input class="btn btn-primary form-control" style="font-size:24px;padding:10%" value="{{trans('cookbook.spagetti_sauce')}}" readonly></a>
        </div>
    </div>
</div>

@endsection