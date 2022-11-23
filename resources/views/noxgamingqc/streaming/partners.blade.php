@extends('layouts.noxgamingqc.app')
@section('title', trans('generic.partners_affiliate'))
@section('content')

<div class="row">
    <div class="col-md-12 item-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12" id="title">
                    <h2>{{trans('generic.partners')}}</h2>
                    <hr />
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">
                            <div class="panel panel-primary text-center">
                                <div class="panel-body img" style="background-image: url('/img/Partners/CorpsRoyaux.png') !important; background-size: cover !important; height: 350px !important;background-position:center center">
                                    <h3 class="img-text"><b>Corps Royaux</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="panel panel-primary text-center">
                                <div class="panel-body img" style="background-image: url('/img/Partners/Instant-Gaming.png') !important; background-size: cover !important; height: 350px !important;background-position:center center">
                                    <h3 class="img-text"><b>Instant Gaming</b></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 item-content bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12" id="title">
                    <h2>{{trans('generic.affiliates')}}</h2>
                    <hr />
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <div class="panel panel-primary text-center">
                                <div class="panel-body extra-life-logo" style="height: 350px !important; background-position:center center">
                                    <h3 class="img-text"><b>Extra Life</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="panel panel-primary text-center">
                                <div class="panel-body img" style="background-image: url('/img/Affiliates/HumbleBundle.png') !important; background-size: cover !important; height: 350px !important; background-position:center center">
                                    <h3 class="img-text"><b>Humble Bundle</b></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection