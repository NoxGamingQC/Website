<div class="modal fade" id="addConsoleModal" tabindex="-1" aria-labelledby="addConsoleModal" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addConsoleLabel">{{trans('game.add_console')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="error-text" aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('game.console')}}: </label>
                        <div class="col-sm-10">
                            <input id="consoleName" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('game.description')}}: </label>
                        <div class="col-sm-10">
                            <input id="consoleDescription" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('game.date')}}: </label>
                        <div class="col-sm-10">
                            <input id="consoleDate" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{trans('game.picture_url')}}: </label>
                        <div class="col-sm-10">
                            <input id="consolePicture" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{trans('general.close')}}</button>
                    <button id="submitAddConsole" type="button" class="btn btn-success">{{trans('general.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#submitAddConsole').on('click', function() {
    $.ajax({
        url: "/" + $('html').attr('lang') + "/console/add",
        method: "post",
        data: {
            'console': $('#consoleName').val(),
            'description': $('#consoleDescription').val(),
            'date': $('#consoleDate').val(),
            'picture': $('#consolePicture').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function() {
            toastr.success('The console have been added successfully. Make sure to reload the page to see your updates.', 'Console added');
        },
        error: function(error) {
            toastr.error('An error occured while adding the new console. Does it already exists?', 'Error');
        }
    });
});
</script>