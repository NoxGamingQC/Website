@extends('layouts.app')

@section('title', trans('general.games'))
@section('slogan', $totalGameCount . ' ' . trans('game.game'))

@section('content')

@php
    $isStaff = auth()->check() && (auth()->user()->is_management);
@endphp

@if($isStaff)
    @include('components.modals.add_game')
    @include('components.modals.edit_game')
    @include('components.modals.add_console')
    @include('components.modals.edit_console')

    <div class="container text-center my-4">
        <button class="btn btn-success mx-2 disabled" data-toggle="modal" data-target="#addConsoleModal">
            {{ trans('game.add_console') }}
        </button>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addGameModal">
            {{ trans('game.add_game') }}
        </button>
    </div>
@endif

<div class="container">
        <div class="mb-5 p-4 rounded">
            {{-- Games Grid --}}
            <div class="row">
                <div class="col-12 mb-4">
                    <h3 class="text-center>">
                        @if($games->isEmpty())
                            {{ trans('game.no_games') }}</p>
                        @endif
                    </h3>
                </div>
                @foreach($games as $game)
                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <div class="card p-0 h-100 border-0 shadow-sm">
                            <div class="card-body p-0 position-relative"
                                 style="background-image: url('{{ $game->cover_url }}');
                                        background-size: cover;
                                        background-position: center;
                                        height: 200px;
                                        border-radius: 10px;">

                                {{-- Overlay --}}
                                <div class="position-absolute bottom-0 w-100 text-center"
                                     style="background: rgba(0,0,0,0.6); border-radius: 0 0 10px 10px;">
                                    <h6 class="text-white m-2">
                                        {{ preg_replace('/\\\\/', '', $game->name) }}
                                    </h6>
                                </div>

                                {{-- Hidden inputs --}}
                                <input type="hidden" id="gameName-{{ $game->id }}" value="{{ $game->game }}">
                                <input type="hidden" id="gameDate-{{ $game->id }}" value="{{ $game->date }}">
                                <input type="hidden" id="gameCoverURL-{{ $game->id }}" value="{{ $game->cover_url }}">
                                <input type="hidden" id="gamePlaylist-{{ $game->id }}" value="{{ $game->playlist }}">
                                <input type="hidden" id="gameFormat-{{ $game->id }}" value="{{ $game->format }}">

                                <button id="{{ $game->id }}"
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