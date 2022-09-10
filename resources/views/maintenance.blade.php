@extends('layouts.maintenance')
@section('title', 'Maintenance')
@section('content')
@include('modal.login')
@include('modal.register')

<nav class="navbar navbar-default" style="margin-top: 5%;">
    <div class="container-fluid">
        <div class="navbar-header">
            <div>
                <img class="img" src="/img/NoxGamingQC.png" width="60" height="60" />
                <h3 class="raleway-font" style="display: inline; margin: 5px;">NoxGamingQC</h3>
                @include('layouts.socials')
            </div>
        </div>
    </div>
</nav>
<br />
<br />

<div class="container">
    <div class="row">
        <div class="col-md-12" id="title">
            <h1>{{trans('maintenance.under_maintenance')}}</h1>
            <hr />
        </div>
        <div class="col-md-12 text-center">
            <div class="panel panel-block-primary">
                <div class="panel-body">
                    <h1 class="text-highlight">{{trans('maintenance.error')}}</h1>
                    <hr />
                    <h5 class="text-highlight">{{trans('maintenance.maintenance_text')}}</h5>
                    <img class="img" src="/img/NoxGamingQC.png" width="10%" />
                    <p class="text-highlight">{{trans('maintenance.explanation')}}</p>
                    <br />
                    <em class="text-highlight">{{trans('maintenance.dev_only')}}</em>
                    <br />
                    @guest
                        <br />
                        <a class="btn btn-default" data-toggle="modal" data-target="#loginModal">{{trans('generic.login')}}</a>
                        <a class="btn btn-default" data-toggle="modal" data-target="#registerModal">{{trans('generic.register')}}</a>
                    @endguest
                    <br />
                    <br />
                    <div class="text center">
                        <a id="frLink" class="text-highlight hidden" href="/fr/maintenance"> Français ({{trans("generic.french")}})</a>
                        <a id="enLink" class="text-highlight hidden" href="/en/maintenance"> English ({{trans("generic.english")}})</a>
                    </div>
                    @auth
                        <hr />
                        <div class="col-md-10">
                            <p class="text-highlight">{{trans('maintenance.already_logged_in')}} <a class="text-highlight" href="/{{app()->getLocale()}}/home">{{trans('maintenance.travel_to_home_page')}}</a></p>
                        </div>
                        <div class="col-md-2 text-right">
                            <a class="btn btn-default text-highlight" href="/logout"> {{trans('generic.logout')}}</a>
                        </div>
                    @endauth
                </div>
            </div>
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
