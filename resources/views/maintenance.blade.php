@extends('layouts.noxgamingqc.maintenance')
@section('title', 'Maintenance')
@section('content')
@include('modal.login')
@include('modal.register')

<nav class="navbar navbar-default" style="margin-top: 2%;">
    <div class="container-fluid">
        <div class="navbar-header">
            <div>
                <img class="img" src="/img/NoxGamingQC.png" width="60" height="60" />
                <h3 class="raleway-font" style="display: inline; margin: 5px;">NoxGamingQC</h3>
            </div>
        </div>
    </div>
</nav>
<br />

<div class="header" style="height:700px !important;">
    <div class="row" style="padding-top: 100px">
        <div class="col-md-12 text-center">
            <h1 class="text-highlight">{{trans('maintenance.error')}}</h1>
            <br />
            <h2 class="text-highlight">{{trans('maintenance.maintenance_text')}}</h2>
            <img class="img" src="/img/NoxGamingQC.png" width="10%" />
            <p class="text-highlight">{{trans('maintenance.explanation')}}</p>
            <br />
            <em class="text-highlight">{{trans('maintenance.dev_only')}}</em>
            <br />
            @guest
                <br />
                <a class="btn btn-default" data-toggle="modal" data-target="#loginModal">{{trans('general.login')}}</a>
                <a class="btn btn-default" data-toggle="modal" data-target="#registerModal">{{trans('general.register')}}</a>
            @endguest
            <br />
            <br />
            <div class="text center">
                <a id="frLink" class="text-color hidden" href="/fr/maintenance"> Français ({{trans("general.french")}})</a>
                <a id="enLink" class="text-color hidden" href="/en/maintenance"> English ({{trans("general.english")}})</a>
            </div>
            @auth
                <hr />
                <div class="col-md-10">
                    <p class="text-highlight">{{trans('maintenance.already_logged_in')}} <a class="text-color" href="/{{app()->getLocale()}}/home">{{trans('maintenance.travel_to_home_page')}}</a></p>
                </div>
                <div class="col-md-2 text-right">
                    <a class="btn btn-default text-highlight" href="/logout"> {{trans('general.logout')}}</a>
                </div>
            @endauth
        </div>
    </div>
</div>
<script type="text/javascript">
    var language = $('html').attr('lang');
    if(language == 'fr') {
        $('#enLink').removeClass('hidden');
        $('#frLink').addClass('hidden');
    } else {
        $('#enLink').addClass('hidden');
        $('#frLink').removeClass('hidden');
    }
</script>
@stop
