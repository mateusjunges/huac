<div class="modal" tabindex="-1"
     role="dialog"
     id="change-status-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Alterar status da cirurgia</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <select name="room"
                                    id="new-status"
                                    class="form-control">
                            </select>
                            <small id="new-status-error"></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-success btn-block" data-event="" id="save-new-status">
                            <i class="fa fa-save"></i> Alterar status
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-default  btn-block" data-dismiss="modal">
                            <i class="fa fa-times"></i> Fechar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
