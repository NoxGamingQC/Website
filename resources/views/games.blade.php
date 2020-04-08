@extends('layouts.app')
@section('title', 'Games')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Games ({{$totalGameCount}})</h1>
        <hr />
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3>NES Games ({{count($nes)}})</h3>
                    <hr />
                    <div class="row">
                        @foreach($nes as $key => $console)
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <p><b>{{$console->Game}}</b></p>
                                    <hr />
                                    <p>Format: {{$console->format}}</p>
                                    <p>Release Date: {{$console->Date}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <h3>PS1 Games ({{count($ps1)}})</h3>
                    <hr />
                    <div class="row">
                        @foreach($ps1 as $key => $console)
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <p><b>{{$console->Game}}</b></p>
                                    <hr />
                                    <p>Format: {{$console->format}}</p>
                                    <p>Release Date: {{$console->Date}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <h3>Xbox Games ({{count($xbox)}})</h3>
                    <hr />
                    <div class="row">
                        @foreach($xbox as $key => $console)
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <p><b>{{$console->Game}}</b></p>
                                    <hr />
                                    <p>Format: {{$console->format}}</p>
                                    <p>Release Date: {{$console->Date}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <h3>Xbox 360 Games ({{count($xbox360)}})</h3>
                    <hr />
                    <div class="row">
                        @foreach($xbox360 as $key => $console)
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <p><b>{{$console->Game}}</b></p>
                                    <hr />
                                    <p>Format: {{$console->format}}</p>
                                    <p>Release Date: {{$console->Date}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <h3>Wii Games ({{count($wii)}})</h3>
                    <hr />
                    <div class="row">
                        @foreach($wii as $key => $console)
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <p><b>{{$console->Game}}</b></p>
                                    <hr />
                                    <p>Format: {{$console->format}}</p>
                                    <p>Release Date: {{$console->Date}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <h3>PS4 Games ({{count($ps4)}})</h3>
                    <hr />
                    <div class="row">
                        @foreach($ps4 as $key => $console)
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <p><b>{{$console->Game}}</b></p>
                                    <hr />
                                    <p>Format: {{$console->format}}</p>
                                    <p>Release Date: {{$console->Date}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <h3>PC Games ({{count($pc)}})</h3>
                    <hr />
                    <div class="row">
                        @foreach($pc as $key => $console)
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <p><b>{{$console->Game}}</b></p>
                                    <hr />
                                    <p>Format: {{$console->format}}</p>
                                    <p>Release Date: {{$console->Date}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop
