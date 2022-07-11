<div class="modal fade" id="addGameModal" tabindex="-1" aria-labelledby="addGameModal" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="AddGameLabel">{{trans('game.add_game')}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="error-text" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        <label>{{trans('game.game')}}: </label><input type="text" class="form-control">
        <label>{{trans('game.console')}}: </label><input type="text" class="form-control">
        <label>{{trans('game.date')}}: </label><input type="text" class="form-control">
        <label>{{trans('game.cover_url')}}: </label><input type="text" class="form-control">
        <label>{{trans('game.format')}}:
        <select class="selectpicker" id="format" title="{{trans('generic.select_placeholder')}}">
            <option value="0">{{trans('game.physical_copy')}}</option>
            <option value="1">{{trans('game.digital_copy')}}</option>
        </select>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{trans('generic.close')}}</button>
        <button type="submit" class="btn btn-success">{{trans('generic.save')}}</button>
      </div>
    </div>
  </div>
</div>