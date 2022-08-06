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
        <div class="col-md-8">
            <h1>{{trans('generic.games')}} ({{$totalGameCount}})</h1>
            <p>{{trans('game.page_description')}}</p>
        </div>
        <div class="col-md-4 text-right">
        @auth
            @if(Auth::user()->isDev || Auth::user()->isAdmin || Auth::user()->isModerator)
                <button a class="btn btn-success" data-toggle="modal" data-target="#addConsoleModal" style="margin-top: 2.5%">{{trans('game.add_console')}}</button>
                <button a class="btn btn-success" data-toggle="modal" data-target="#addGameModal" style="margin-top: 2.5%">{{trans('game.add_game')}}</button>
            @endif
        @endauth
        </div>
    </div>
    @foreach($consoles as $key=>$console)
        @if(array_key_exists($console->id, $gamesList))
        <div class="col-md-12">
            <h3>{{$console->Console}} ({{count($gamesList[$console->id])}})</h3>
            <hr />
            <br />
            <div class="row">
                <div class="col-md-12">
                    @php ($currentCount = 0)
                    @foreach($gamesList[$console->id] as $key => $game)
                        <div class="col-md-3">
                            @if(is_int($game))
                                <div class="panel panel-primary text-center">
                                    <div class="panel-body" style="background-image: url('https://static-cdn.jtvnw.net/ttv-boxart/{{$games[$gameID]->Game}}-285x380.jpg') !important; background-size: cover !important; height: 380px !important;">
                                        <h2 class="game-title"><b>{{preg_replace('/\\\\/', '', $games[$game]->Game)}}</b></h2>
                                        <input id="gameName-{{$game}}" type="hidden" value="{{$games[$game]->Game}}">
                                        <input id="gameConsole-{{$game}}" type="hidden" value="{{$games[$game]->Console}}">
                                        <input id="gameDate-{{$game}}" type="hidden" value="{{$games[$game]->Date}}">
                                        <input id="gameCoverURL-{{$game}}" type="hidden" value="{{$games[$game]->CoverURL}}">
                                        <input id="gamePlaylist-{{$game}}" type="hidden" value="{{$games[$game]->Playlist}}">
                                        <input id="gameFormat-{{$game}}" type="hidden" value="{{$games[$game]->Format}}">
                                        <button id="{{$game}}" class="edit-game-button btn btn-info" type="button" data-toggle="modal" data-target="#editGameModal">{{trans('generic.see_more')}}</button>
                                    </div>
                                </div>
                            @else
                                <div class="panel panel-primary text-center">
                                    <div class="panel-body" style="background-image: url('https://static-cdn.jtvnw.net/ttv-boxart/{{$game->Game}}-285x380.jpg') !important; background-size: cover !important; height: 380px !important;">
                                        <h2 class="game-title"><b>{{preg_replace('/\\\\/', '', $game->Game)}}</b></h2>
                                        <input id="gameName-{{$game->id}}" type="hidden" value="{{$game->Game}}">
                                        <input id="gameConsole-{{$game->id}}" type="hidden" value="{{$game->Console}}">
                                        <input id="gameDate-{{$game->id}}" type="hidden" value="{{$game->Date}}">
                                        <input id="gameCoverURL-{{$game->id}}" type="hidden" value="{{$game->CoverURL}}">
                                        <input id="gamePlaylist-{{$game->id}}" type="hidden" value="{{$game->Playlist}}">
                                        <input id="gameFormat-{{$game->id}}" type="hidden" value="{{$game->Format}}">
                                        <button id="{{$game->id}}" class="edit-game-button btn btn-info" type="button" data-toggle="modal" data-target="#editGameModal">{{trans('generic.see_more')}}</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if($currentCount == 3)
                            </div>
                            <div class="col-md-12">
                            @php ($currentCount = 0)
                        @else
                            @php ($currentCount += 1)
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    @endforeach
</div>
<script>
$('.edit-game-button').on('click', function() {
var id = $(this).attr('id');
var oldGameName = $('#gameName-' + id).val();
var oldGameConsole = $('#gameConsole-' + id).val();
var oldGameFormat = $('#gameFormat-' + id).val();
var oldGameDate = $('#gameGameDate-' + id).val();
var oldGamePlaylist = $('#gameGamePlaylist-' + id).val();
var oldGameCoverURL = $('#gameCoverURL-' + id).val();

$('#editGameID').val(id);
$('#editGameName').val(oldGameName);
$('#editGameConsole').selectpicker('val', oldGameConsole);
$('#editGameDate').val(oldGameDate);
$('#editGameCoverURL').val(oldGameCoverURL);
$('#editGamePlaylist').val(oldGamePlaylist);
$('#editGameFormat').selectpicker('val', oldGameFormat ? 1 : 0);
});
</script>
@stop