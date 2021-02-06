@extends('layouts.maintenance')
@section('title', 'Maintenance')
@section('content')
@include('modal.login')
@include('modal.register')
<h1>{{trans('maintenance.under_maintenance')}}</h1>
<hr />
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{{trans('maintenance.under_maintenance')}}</div>

                <div class="panel-body">
                    <h3>{{trans('maintenance.sorry')}}</h3>

                    <p>{{trans('maintenance.explanation')}}</p>
                    <br />
                    <em>{{trans('maintenance.dev_only')}}</em>
                    <br />
                    @guest
                        <br />
                        <a class="btn btn-primary" data-toggle="modal" data-target="#loginModal">{{trans('generic.login')}}</a>
                        <a class="btn btn-primary" data-toggle="modal" data-target="#registerModal">{{trans('generic.register')}}</a>
                    @endguest
                    <div class="pull-right">
                        <a id="frLink" class="hidden" href="/fr/maintenance"> Français ({{trans("generic.french")}})</a>
                        <a id="enLink" class="hidden" href="/en/maintenance"> English ({{trans("generic.english")}})</a>
                    </div>
                    @auth
                        <hr />
                       <p>{{trans('maintenance.already_logged_in')}} <a href="/{{app()->getLocale()}}/home">{{trans('maintenance.travel_to_home_page')}}</a></p>
                       <br />
                        <a class="btn btn-primary pull-right" href="/logout"> {{trans('generic.logout')}}</a>
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
