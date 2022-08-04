@extends('layouts.app')
@section('title', trans('services.services'))
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12" id="title">
            <h1>{{trans('services.services')}}</h1>
            <span class="text-warning">{{trans('services.territories')}}</span>
            <hr />
            <p class="text-info">{{trans('services.taxes')}}</p>
            <p class="text-info">{{trans('services.traveling_fee_above')}}</p>
            <p class="text-info">{{trans('services.price_may_change')}}</p>
            <p class="text-info">{{trans('services.payment_type')}}</p>
            <br />
            <div class="row">
                <div class="col-md-12">
                    <h3>{{trans('services.computer_science')}}</h3>
                    <br />
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-body text-center">
                                <h4>{{trans('services.format')}}</h4>
                                <p class="text-warning"><i>P.S. {{trans('services.licence_not_included')}}</i></p>
                                <p>40C$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-body text-center">
                                <h4>{{trans('services.diagnostics')}}</h4>
                                <p class="text-warning"><i>P.S. {{trans('services.diagnostics_info')}}</i></p>
                                <p>30C$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-body text-center">
                                <p>{{trans('services.computer_other')}}</p>
                                <p>18C$/h</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h3>{{trans('services.car')}}</h3>
                    <br />
                    <div class="col-md-4 col-md-offset-2">
                        <div class="panel panel-primary">
                            <div class="panel-body text-center">
                                <h4>{{trans('services.exterior_cleaning')}}</h4>
                                <p>20C$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-body text-center">
                                <h4>{{trans('services.car_polish')}}</h4>
                                <p>50C$</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h3>{{trans('services.other')}}</h3>
                    <br />
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-primary">
                            <div class="panel-body text-center">
                                <h4>{{trans('services.snow_removal')}}</h4>
                                <p class="text-warning"><i>P.S. {{trans('services.snow_removal_info')}}</i></p>
                                <p>20C$/hrs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
