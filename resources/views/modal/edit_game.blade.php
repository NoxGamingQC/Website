<div class="modal fade" id="editGameModal" tabindex="-1" aria-labelledby="editGameModal" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editGameLabel">{{trans('game.edit_game')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="error-text" aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('game.game')}}: </label>
                        <div class="col-sm-10">
                            <input id="editGameName" type="text" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('game.console')}}: </label>
                        <div class="col-sm-10">
                            <select class="selectpicker" id="editGameConsole" title="{{trans('generic.select_placeholder')}}">
                            @foreach($consoles as $key => $console)
                                <option value="{{$console->id}}">{{$console->Console}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('game.date')}}: </label>
                        <div class="col-sm-10">
                            <input id="editGameDate" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('game.cover_url')}}: </label>
                        <div class="col-sm-10">
                            <input id="editGameCoverURL" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('game.format')}}: </label>
                        <div class="col-sm-10">
                            <select class="selectpicker" id="editGameFormat" title="{{trans('generic.select_placeholder')}}">
                                <option value="0">{{trans('game.physical_copy')}}</option>
                                <option value="1">{{trans('game.digital_copy')}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{trans('generic.close')}}</button>
                    <button type="button" id="submitEditGame" class="btn btn-success">{{trans('generic.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#submitAddGame').on('click', function() {
    $.ajax({
        url: "/" + $('html').attr('lang') + "/games/edit",
        method: "post",
        data: {
            'game': $('#editGameName').val(),
            'console': $('#editGameConsole').val(),
            'date': $('#editGameDate').val(),
            'coverURL': $('#editGameCoverURL').val(),
            'format': $('#editGameFormat').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function() {
            toastr.success('The game have been edited successfully. Make sure to reload the page to see your updates.', 'Game edited');
        },
        error: function(error) {
            toastr.error('An error occured while edited a new game.', 'Error');
        }
    });
});
</script>