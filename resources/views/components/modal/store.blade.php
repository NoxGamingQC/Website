<div class="modal fade" id="storeModal" tabindex="-1" aria-labelledby="storeModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="storeModalTitle"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="error-text" aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8">
                    <p id="storeModalDescription" class="text-justify"></p>
                </div>
                <div class="col-md-4">
                    <img id="storeModalImage" class="img-rounded" src="" width="100%" />
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">{{trans('general.close')}}</button>
        </div>
        </div>
    </div>
</div>
