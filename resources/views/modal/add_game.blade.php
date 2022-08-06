<div class="modal fade" id="addGameModal" tabindex="-1" aria-labelledby="addGameModal" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="AddGameLabel">{{trans('game.add_game')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="error-text" aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="/games/add" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('game.game')}}: </label>
                        <div class="col-sm-10">
                            <input id="gameName" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('game.console')}}: </label>
                        <div class="col-sm-10">
                            <select class="selectpicker" id="gameConsole" title="{{trans('generic.select_placeholder')}}" multiple>
                            @foreach($consoles as $key => $console)
                                <option value="{{$console->id}}">{{$console->Console}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('game.date')}}: </label>
                        <div class="col-sm-10">
                            <input id="gameDate" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('game.cover_url')}}: </label>
                        <div class="col-sm-10">
                            <input id="gameCoverURL" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('game.playlist')}}: </label>
                        <div class="col-sm-10">
                            <input id="gamePlaylist" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('game.format')}}: </label>
                        <div class="col-sm-10">
                            <select class="selectpicker" id="gameFormat" title="{{trans('generic.select_placeholder')}}" multiple>
                                <option value="0">{{trans('game.physical_copy')}}</option>
                                <option value="1">{{trans('game.digital_copy')}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{trans('generic.close')}}</button>
                    <button type="button" id="submitAddGame" class="btn btn-success">{{trans('generic.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#submitAddGame').on('click', function() {
    $.ajax({
        url: "/" + $('html').attr('lang') + "/games/add",
        method: "post",
        data: {
            'game': $('#gameName').val(),
            'console': $('#gameConsole').val(),
            'date': $('#gameDate').val(),
            'coverURL': $('#gameCoverURL').val(),
            'playlist': $('#gamePlaylist').val(),
            'format': $('#gameFormat').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function() {
            toastr.success('The game have been added successfully. Make sure to reload the page to see your updates.', 'Game added');
        },
        error: function(error) {
            toastr.error('An error occured while adding a new game. Does it already exists?', 'Error');
        }
    });
});
</script>