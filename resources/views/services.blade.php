@extends('layouts.app')
@section('title', trans('services.services'))
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12" id="title">
            <h1>{{trans('services.services')}}</h1>
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <h3>{{trans('services.computer_science')}}</h3>
                    <span>{{trans('services.territories')}}</span>
                    <hr />
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-body text-center">
                                <p>{{trans('services.format')}}</p>
                                <p>40$CAD</p>
                                <p class="text-warning"><i>P.S. {{trans('services.licence_not_included')}}</i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-body text-center">
                                <p>{{trans('services.diagnostics')}}</p>
                                <p>30$CAD</p>
                                <p class="text-warning"><i>P.S. {{trans('services.diagnostics_info')}}</i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-body text-center">
                                <p>{{trans('services.computer_other')}}</p>
                                <p>18$CAD/h</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-center text-info">{{trans('services.traveling_fee_above')}}</p>
                    <p class="text-center text-info">{{trans('services.taxes')}}</p>
                </div>
                <div class="col-md-12">
                    <h3>{{trans('services.delivery')}}</h3>
                    <span>{{trans('services.territories')}}</span>
                    <hr />
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-body text-center">
                                <p>{{trans('services.delivery')}}</p>
                                <p>0.75$CAD$/km + 3$CAD ({{trans('services.base_fees')}})</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-body text-center">
                                <p>{{trans('services.lift')}}</p>
                                <p>0.75$CAD$/km + 3$CAD ({{trans('services.base_fees')}})</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-center text-info">{{trans('services.taxes')}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
