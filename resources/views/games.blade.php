@extends('layouts.app')
@section('title', 'Games')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>{{trans('generic.games')}} ({{$totalGameCount}})</h1>
        <hr />
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3>{{trans('generic.nes_games')}} ({{count($nes)}})</h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            @php ($currentCount = 0)
                            @foreach($nes as $key => $console)
                            <div class="col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-body" style="background-image: url('https://static-cdn.jtvnw.net/ttv-boxart/{{$console->Game}}-285x380.jpg') !important; background-size: cover !important; height: 380px !important;">
                                        <h4 class="stroke"><b>{{$console->Game}}</b></h4>
                                        <hr />
                                        <p class="stroke">{{trans('generic.format')}}: {{$console->format}}</p>
                                        @if ($console->Date)
                                        <p class="stroke">{{trans('generic.release_date')}}: {{$console->Date}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if($currentCount == 3)
                                </div>
                                <div class="col-md-12">
                                @php ($currentCount = 0)
                            @else
                                @php ($currentCount += 1)
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <h3>{{trans('generic.ps1_games')}} ({{count($ps1)}})</h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            @php ($currentCount = 0)
                            @foreach($ps1 as $key => $console)
                                <div class="col-md-3">
                                    <div class="panel panel-default">
                                    <div class="panel-body" style="background-image: url('https://static-cdn.jtvnw.net/ttv-boxart/{{$console->Game}}-285x380.jpg') !important; background-size: cover !important; height: 380px !important;">
                                            <h4 class="stroke"><b>{{$console->Game}}</b></h4>
                                            <hr />
                                            <p class="stroke">{{trans('generic.format')}}: {{$console->format}}</p>
                                            @if ($console->Date)
                                            <p class="stroke">{{trans('generic.release_date')}}: {{$console->Date}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @if($currentCount == 3)
                                </div>
                                <div class="col-md-12">
                                @php ($currentCount = 0)
                            @else
                                @php ($currentCount += 1)
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <h3>{{trans('generic.xbox_games')}} ({{count($xbox)}})</h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            @php ($currentCount = 0)
                            @foreach($xbox as $key => $console)
                            <div class="col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-body" style="background-image: url('https://static-cdn.jtvnw.net/ttv-boxart/{{$console->Game}}-285x380.jpg') !important; background-size: cover !important; height: 380px !important;">
                                        <h4 class="stroke"><b>{{$console->Game}}</b></h4>
                                        <hr />
                                        <p class="stroke">{{trans('generic.format')}}: {{$console->format}}</p>
                                        @if ($console->Date)
                                        <p class="stroke">{{trans('generic.release_date')}}: {{$console->Date}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if($currentCount == 3)
                                </div>
                                <div class="col-md-12">
                                @php ($currentCount = 0)
                            @else
                                @php ($currentCount += 1)
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <h3>{{trans('generic.xbox360_games')}} ({{count($xbox360)}})</h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            @php ($currentCount = 0)
                            @foreach($xbox360 as $key => $console)
                            <div class="col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-body" style="background-image: url('https://static-cdn.jtvnw.net/ttv-boxart/{{$console->Game}}-285x380.jpg') !important; background-size: cover !important; height: 380px !important;">
                                        <h4 class="stroke"><b>{{$console->Game}}</b></h4>
                                        <hr />
                                        <p class="stroke">{{trans('generic.format')}}: {{$console->format}}</p>
                                        @if ($console->Date)
                                        <p class="stroke">{{trans('generic.release_date')}}: {{$console->Date}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if($currentCount == 3)
                                </div>
                                <div class="col-md-12">
                                @php ($currentCount = 0)
                            @else
                                @php ($currentCount += 1)
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <h3>{{trans('generic.wii_games')}} ({{count($wii)}})</h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            @php ($currentCount = 0)
                            @foreach($wii as $key => $console)
                            <div class="col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-body" style="background-image: url('https://static-cdn.jtvnw.net/ttv-boxart/{{$console->Game}}-285x380.jpg') !important; background-size: cover !important; height: 380px !important;">
                                        <h4 class="stroke"><b>{{$console->Game}}</b></h4>
                                        <hr />
                                        <p class="stroke">{{trans('generic.format')}}: {{$console->format}}</p>
                                        @if ($console->Date)
                                        <p class="stroke">{{trans('generic.release_date')}}: {{$console->Date}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if($currentCount == 3)
                                </div>
                                <div class="col-md-12">
                                @php ($currentCount = 0)
                            @else
                                @php ($currentCount += 1)
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <h3>{{trans('generic.ps4_games')}} ({{count($ps4)}})</h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            @php ($currentCount = 0)
                            @foreach($ps4 as $key => $console)
                            <div class="col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-body" style="background-image: url('https://static-cdn.jtvnw.net/ttv-boxart/{{$console->Game}}-285x380.jpg') !important; background-size: cover !important; height: 380px !important;">
                                        <h4 class="stroke"><b>{{$console->Game}}</b></h4>
                                        <hr />
                                        <p class="stroke">{{trans('generic.format')}}: {{$console->format}}</p>
                                        @if ($console->Date)
                                        <p class="stroke">{{trans('generic.release_date')}}: {{$console->Date}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if($currentCount == 3)
                                </div>
                                <div class="col-md-12">
                                @php ($currentCount = 0)
                            @else
                                @php ($currentCount += 1)
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <h3>{{trans('generic.pc_games')}} ({{count($pc)}})</h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            @php ($currentCount = 0)
                            @foreach($pc as $key => $console)
                                <div class="col-md-3">
                                    <div class="panel panel-primary">
                                        <div class="panel-body" style="background-image: url('https://static-cdn.jtvnw.net/ttv-boxart/{{$console->Game}}-285x380.jpg') !important; background-size: cover !important; height: 380px !important;">
                                            <h4 class="stroke"><b>{{$console->Game}}</b></h4>
                                            <hr />
                                            <p class="stroke">{{trans('generic.format')}}: {{$console->format}}</p>
                                            @if ($console->Date)
                                            <p class="stroke">{{trans('generic.release_date')}}: {{$console->Date}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if($currentCount == 3)
                                    </div>
                                    <div class="col-md-12">
                                    @php ($currentCount = 0)
                                @else
                                    @php ($currentCount += 1)
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
