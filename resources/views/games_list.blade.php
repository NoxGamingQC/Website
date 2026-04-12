@extends('layouts.app')

@section('title', trans('general.games'))
@section('slogan', $totalGameCount . ' ' . trans('game.game'))

@section('content')

@php
    $isStaff = auth()->check() && (auth()->user()->isDev || auth()->user()->isAdmin || auth()->user()->isModerator);
@endphp

@if($isStaff)
    @include('modal.add_game')
    @include('modal.edit_game')
    @include('modal.add_console')
    @include('modal.edit_console')

    <div class="container text-center my-4">
        <button class="btn btn-success mx-2" data-toggle="modal" data-target="#addConsoleModal">
            {{ trans('game.add_console') }}
        </button>
        <button class="btn btn-success mx-2" data-toggle="modal" data-target="#addGameModal">
            {{ trans('game.add_game') }}
        </button>
    </div>
@endif

<div class="container">

@foreach($consoles as $index => $console)
    @php
        $gamesForConsole = $gamesList[$console->id] ?? [];
    @endphp

    @if(count($gamesForConsole))
        <div class="mb-5 p-4 rounded {{ $index % 2 === 0 ? 'bg-dark text-white' : '' }}">

            {{-- Console Header --}}
            <div class="mb-4">
                <h2 class="mb-1">
                    {{ $console->console }} ({{ count($gamesForConsole) }})
                </h2>
                <p class="mb-0">{{ $console->description }}</p>
            </div>

            {{-- Games Grid --}}
            <div class="row">
                @foreach($gamesForConsole as $game)
                    @php
                        $gameObj = is_int($game) ? $games[$game] : $game;
                        $id = is_int($game) ? $game : $game->id;
                        $cover = "https://static-cdn.jtvnw.net/ttv-boxart/{$gameObj->game}-285x380.jpg";
                    @endphp

                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <div class="card p-0 h-100 border-0 shadow-sm">
                            <div class="card-body p-0 position-relative"
                                 style="background-image: url('{{ $cover }}');
                                        background-size: cover;
                                        background-position: center;
                                        height: 200px;
                                        border-radius: 10px;">

                                {{-- Overlay --}}
                                <div class="position-absolute bottom-0 w-100 text-center"
                                     style="background: rgba(0,0,0,0.6); border-radius: 0 0 10px 10px;">
                                    <h6 class="text-white m-2">
                                        {{ preg_replace('/\\\\/', '', $gameObj->game) }}
                                    </h6>
                                </div>

                                {{-- Hidden inputs --}}
                                <input type="hidden" id="gameName-{{ $id }}" value="{{ $gameObj->game }}">
                                <input type="hidden" id="gameConsole-{{ $id }}" value="{{ $gameObj->console }}">
                                <input type="hidden" id="gameDate-{{ $id }}" value="{{ $gameObj->date }}">
                                <input type="hidden" id="gameCoverURL-{{ $id }}" value="{{ $gameObj->cover_url }}">
                                <input type="hidden" id="gamePlaylist-{{ $id }}" value="{{ $gameObj->playlist }}">
                                <input type="hidden" id="gameFormat-{{ $id }}" value="{{ $gameObj->format }}">

                                <button id="{{ $id }}"
                                        class="edit-game-button btn btn-info d-none position-absolute top-50 start-50 translate-middle"
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editGameModal">
                                    {{ trans('general.see_more') }}
                                </button>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    @endif
@endforeach

</div>

<script>
document.querySelectorAll('.edit-game-button').forEach(button => {
    button.addEventListener('click', function () {
        const id = this.id;

        const getVal = (field) => document.getElementById(field + '-' + id)?.value;

        document.getElementById('editGameID').value = id;
        document.getElementById('editGameName').value = getVal('gameName');
        $('#editGameConsole').selectpicker('val', getVal('gameConsole'));
        document.getElementById('editGameDate').value = getVal('gameDate');
        document.getElementById('editGameCoverURL').value = getVal('gameCoverURL');
        document.getElementById('editGamePlaylist').value = getVal('gamePlaylist');
        $('#editGameFormat').selectpicker('val', getVal('gameFormat') ? 1 : 0);
    });
});
</script>

@endsection