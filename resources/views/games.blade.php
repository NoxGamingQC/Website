@extends('layouts.app')
@section('title', 'Games')
@section('content')
@auth
    @if(Auth::user()->isDev || Auth::user()->isAdmin || Auth::user()->isModerator)
        @include('modal.add_game')
        @include('modal.edit_game')
        @include('modal.add_console')
        @include('modal.edit_console')
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
                <h3>{{$console->Console}} ({{count($gamesList[$console->id])}})</h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            @php ($currentCount = 0)
                            @foreach($gamesList[$console->id] as $key => $game)
                            <div class="col-md-3">
                                <div class="panel panel-primary text-center">
                                    <div class="panel-body" style="background-image: url('https://static-cdn.jtvnw.net/ttv-boxart/{{$game->Game}}-285x380.jpg') !important; background-size: cover !important; height: 380px !important;">
                                        <h2 class="game-title"><b>{{preg_replace('/\\\\/', '', $game->Game)}}</b></h2>
                                        <input id="gameName-{{$game->id}}" type="hidden" value="{{$game->Game}}">
                                        <input id="gameConsole-{{$game->id}}" type="hidden" value="{{$game->Console}}">
                                        <input id="gameDate-{{$game->id}}" type="hidden" value="{{$game->Date}}">
                                        <input id="gameCoverURL-{{$game->id}}" type="hidden" value="{{$game->CoverURL}}">
                                        <input id="gameFormat-{{$game->id}}" type="hidden" value="{{$game->format}}">
                                        <button id="{{$game->id}}" class="edit-game-button btn btn-primary" type="button" data-toggle="modal" data-target="#editGameModal">{{trans('generic.see_more')}}</button>
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
<script>
$('.edit-game-button').on('click', function() {
var id = $(this).attr('id');
var oldGameName = $('#gameName-' + id).val();
var oldGameConsole = $('#gameConsole-' + id).val();
var oldGameFormat = $('#gameFormat-' + id).val();
var oldGameDate = $('#gameGameDate-' + id).val();
var oldGameCoverURL = $('#gameCoverURL-' + id).val();

$('#editGameName').val(oldGameName);
$('#editGameConsole').selectpicker('val', oldGameConsole);
$('#editGameDate').val(oldGameDate);
$('#editGameCoverURL').val(oldGameCoverURL);
$('#editGameFormat').selectpicker('val', oldGameFormat ? 1 : 0);
});
</script>
@stop