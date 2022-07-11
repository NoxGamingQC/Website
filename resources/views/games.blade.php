@extends('layouts.app')
@section('title', 'Games')
@section('content')
@auth
    @if(Auth::user()->isDev || Auth::user()->isAdmin || Auth::user()->isModerator)
        @include('modal.add_game')
        @include('modal.add_console')
    @endif
@endauth
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <h1>{{trans('generic.games')}} ({{$totalGameCount}})</h1>
        </div>
        <div class="col-md-6 text-right">
        @auth
            @if(Auth::user()->isDev || Auth::user()->isAdmin || Auth::user()->isModerator)
                <button a class="btn btn-success" data-toggle="modal" data-target="#addConsoleModal" style="margin-top: 2.5%">{{trans('game.add_console')}}</button>
                <button a class="btn btn-success" data-toggle="modal" data-target="#addGameModal" style="margin-top: 2.5%">{{trans('game.add_game')}}</button>
            @endif
        @endauth
        </div>
    </div>
    <div class="col-md-12">
        <hr />
        <div class="panel panel-primary">
            <div class="panel-body">
            @foreach($consoles as $key=>$console)
                <h3>{{$console->Console}} ({{count($gamesList)}})</h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            @php ($currentCount = 0)
                            @foreach($gamesList[$console->id] as $key => $game)
                            <div class="col-md-3">
                                <div class="panel panel-primary">
                                    <div class="panel-body" style="background-image: url('https://static-cdn.jtvnw.net/ttv-boxart/{{$game->Game}}-285x380.jpg') !important; background-size: cover !important; height: 380px !important;">
                                        <h4 class="stroke"><b>{{preg_replace('/\\\\/', '', $game->Game)}}</b></h4>
                                        <hr />
                                        <p class="stroke">{{trans('generic.format')}}: {{$game->format ? trans('game.digital') : trans('game.physical')}}</p>
                                        @if ($game->Date)
                                        <p class="stroke">{{trans('generic.release_date')}}: {{$game->Date}}</p>
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@stop