<div class="modal" tabindex="-1"
     role="dialog"
     id="deny-materials-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Negar materiais da cirurgia</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="deny-materials-observation">Observação:</label>
                            <textarea name="observation"
                                      class="form-control"
                                      id="deny-materials-observation"
                                      cols="30" rows="10"></textarea>
                            <small id="new-date-error"></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-success btn-block" data-event="" id="deny">
                            <i class="fa fa-times-circle"></i> Negar materiais
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
