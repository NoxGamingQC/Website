@extends('layouts.pages.app')
@section('title', trans('general.partners_affiliate'))
@section('content')

<div class="container section">
    <div class="row">
        <div class="col-12 item-content">
            <div class="row">
                <div class="col-12" id="title">
                    <h2>{{trans('general.partners')}}</h2>
                    <hr />
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="offset-1 col-5">
                            <div class="panel panel-default text-center">
                                <div class="panel-body" style="background-image: url('/img/Partners/CorpsRoyaux.png') !important; background-size: cover !important; height: 200px !important;background-position:center center">
                                    <h3 class="text-badge"><b>Corps Royaux</b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="panel panel-default text-center">
                                <div class="panel-body" style="background-image: url('/img/Partners/Instant-Gaming.png') !important; background-size: cover !important; height: 200px !important;background-position:center center">
                                    <h3 class="text-badge"><b>Instant Gaming</b></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container section">
    <div class="col-12">
        <div class="row">
            <div class="col-12" id="title">
                <h2>{{trans('general.affiliates')}}</h2>
                <hr />
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-5 offset-1">
                        <div class="panel panel-default text-center">
                            <div class="panel-body extra-life-logo" style="height: 200px !important; background-position:center center">
                                <h3 class="text-badge"><b>Extra Life</b></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="panel panel-default text-center">
                            <div class="panel-body img" style="background-image: url('/img/Affiliates/HumbleBundle.png') !important; background-size: cover !important; height: 200px !important; background-position:center center">
                                <h3 class="text-badge"><b>Humble Bundle</b></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection