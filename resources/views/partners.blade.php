@extends('layouts.app')
@section('title', 'Teams')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12" id="title">
            <h1>{{trans('generic.partners_affiliate')}}</h1>
            <hr />
        </div>
        <div class="col-md-12" id="title">
            <h2>{{trans('generic.partners')}}</h2>
            <hr />
        </div>
        </div class="col-md-12">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                <div class="panel panel-primary text-center">
                    <div class="panel-body img" style="background-image: url('/img/Partners/CorpsRoyaux.png') !important; background-size: cover !important; height: 350px !important;background-position:center center">
                        <h3 class="title"><b>Corps Royaux</b></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary text-center">
                    <div class="panel-body img" style="background-image: url('/img/Partners/Instant-Gaming.png') !important; background-size: cover !important; height: 380px !important;background-position:center center">
                        <h3 class="title"><b>Humble Bundle</b></h3>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-12" id="title">
            <h2>{{trans('generic.affiliates')}}</h2>
            <hr />
        </div>
        </div class="col-md-12">
            <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <div class="panel panel-primary text-center">
                    <div class="panel-body extra-life-logo" style="height: 380px !important; background-position:center center">
                        <h3 class="title"><b>Extra Life</b></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary text-center">
                    <div class="panel-body img" style="background-image: url('/img/Affiliates/HumbleBundle.png') !important; background-size: cover !important; height: 380px !important; background-position:center center">
                        <h3 class="title"><b>Humble Bundle</b></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop