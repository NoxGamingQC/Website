<div class="modal fade" id="addGameModal" tabindex="-1" aria-labelledby="addGameModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form method="POST" action="/games/add">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="addGameModalLabel">
                        {{ trans('game.add_game') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="row">

                        {{-- Game Name --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{ trans('game.name') }}</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        {{-- Console --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{ trans('game.console') }}</label>
                            <select name="console_id" class="form-control selectpicker" data-live-search="true" required>
                                @foreach($consoles as $console)
                                    <option value="{{ $console->id }}">
                                        {{ $console->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Release Date --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{ trans('game.date') }}</label>
                            <input type="date" name="date" class="form-control">
                        </div>

                        {{-- Cover URL --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">{{ trans('game.cover') }}</label>
                            <input type="url" name="cover_url" class="form-control" placeholder="https://...">
                        </div>

                        {{-- Playlist --}}
                        <div class="col-12 mb-3">
                            <label class="form-label">{{ trans('game.playlist') }}</label>
                            <input type="text" name="playlist" class="form-control">
                        </div>

                        {{-- Format --}}
                        <div class="col-12 mb-3">
                            <label class="form-label">{{ trans('game.format') }}</label>
                            <select name="format" class="form-control selectpicker">
                                <option value="both">{{ trans('game.both') }}</option>
                                <option value="physical">{{ trans('game.physical') }}</option>
                                <option value="digital">{{ trans('game.digital') }}</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        {{ trans('general.cancel') }}
                    </button>
                    <button type="submit" class="btn btn-success">
                        {{ trans('general.submit') }}
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>