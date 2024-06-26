@extends('layouts.pages.app')
@section('title', trans('general.games'))
@section('slogan', $totalGameCount . ' ' . trans('game.game'))
@section('content')
@auth
    @if(Auth::user()->isDev || Auth::user()->isAdmin || Auth::user()->isModerator)
        @include('modal.add_game')
        @include('modal.edit_game')
        @include('modal.add_console')
        @include('modal.edit_console')
    @endif
@endauth
@auth
    @if(Auth::user()->isDev || Auth::user()->isAdmin || Auth::user()->isModerator)
        <div class="row content-item text-center">
            <div class="col-md-12">
                <div class="container">
                    <button a class="btn btn-success" data-toggle="modal" data-target="#addConsoleModal" style="margin-top: 2.5%">{{trans('game.add_console')}}</button>
                    <button a class="btn btn-success" data-toggle="modal" data-target="#addGameModal" style="margin-top: 2.5%">{{trans('game.add_game')}}</button>
                </div>
            </div>
        </div>
    @endif
@endauth
@foreach($consoles as $key=>$console)
    @if(array_key_exists($console->id, $gamesList))
    @if(($key % 2) == 0)
        <div class="row bg-dark content-item">
    @else
        <div class="row content-item">
    @endif
        <div class="col-md-12">
            <div class="container">
                <h2>{{$console->console}} ({{count($gamesList[$console->id])}})</h2>
                <h4 class="text-justify">{{$console->description}}</h4>
                <br />
                <br />
                <div class="row">
                    <div class="col-md-12">
                        @php ($currentCount = 0)
                        @foreach($gamesList[$console->id] as $key => $game)
                            <div class="col-md-3">
                                @if(is_int($game))
                                    <div class="panel panel-primary text-center" style="border-radius: 10px;">
                                        <div class="panel-body img" style="background-image: url({{"\""}}https://static-cdn.jtvnw.net/ttv-boxart/{{$games[$gameID]->game}}-285x380.jpg{{"\""}})  !important; background-size: cover !important; background-position: center center; min-height: 200px !important; height: 200px !important;border-radius: 10px;border: 3px solid white;">
                                            <h3 class="text-badge"><b>{{preg_replace('/\\\\/', '', $games[$game]->game)}}</b></h3>
                                            <input id="gameName-{{$game}}" type="hidden" value="{{$games[$game]->game}}">
                                            <input id="gameConsole-{{$game}}" type="hidden" value="{{$games[$game]->console}}">
                                            <input id="gameDate-{{$game}}" type="hidden" value="{{$games[$game]->date}}">
                                            <input id="gameCoverURL-{{$game}}" type="hidden" value="{{$games[$game]->cover_url}}">
                                            <input id="gamePlaylist-{{$game}}" type="hidden" value="{{$games[$game]->playlist}}">
                                            <input id="gameFormat-{{$game}}" type="hidden" value="{{$games[$game]->format}}">
                                            <button id="{{$game}}" class="edit-game-button btn btn-info hidden" type="button" data-toggle="modal" data-target="#editGameModal">{{trans('general.see_more')}}</button>
                                        </div>
                                    </div>
                                @else
                                    <div class="panel panel-primary text-center" style="border-radius: 10px;">
                                        <div class="panel-body img" style="background-image: url({{"\""}}https://static-cdn.jtvnw.net/ttv-boxart/{{$game->game}}-285x380.jpg{{"\""}}) !important; background-size: cover !important; background-position: center center; min-height: 200px !important; height: 200px !important;border-radius: 10px;border: 3px solid white;">
                                            <h3 class="text-badge"><b>{{preg_replace('/\\\\/', '', $game->game)}}</b></h3>
                                            <input id="gameName-{{$game->id}}" type="hidden" value="{{$game->game}}">
                                            <input id="gameConsole-{{$game->id}}" type="hidden" value="{{$game->console}}">
                                            <input id="gameDate-{{$game->id}}" type="hidden" value="{{$game->date}}">
                                            <input id="gameCoverURL-{{$game->id}}" type="hidden" value="{{$game->cover_url}}">
                                            <input id="gamePlaylist-{{$game->id}}" type="hidden" value="{{$game->playlist}}">
                                            <input id="gameFormat-{{$game->id}}" type="hidden" value="{{$game->format}}">
                                            <button id="{{$game->id}}" class="edit-game-button btn btn-info hidden" type="button" data-toggle="modal" data-target="#editGameModal">{{trans('general.see_more')}}</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
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
@endsection