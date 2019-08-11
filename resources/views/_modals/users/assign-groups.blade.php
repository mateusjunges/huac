<div class="modal fade" tabindex="-1" role="dialog" id="assign-groups-to-user-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Adiconar grupos ao usuário <span id="group-name"></span></h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="user_id">Selecione o usuário:</label>
                        <select name="user"
                                class="form-control"
                                disabled
                                id="select-user-to-group">
                        </select>
                        <small id="error-user"></small>
                    </div>
                    <div class="form-group">
                        <label for="select-user-groups">Selecione os grupos:</label>
                        <select name="groups[]"
                                multiple="multiple"
                                style="width: 100%"
                                id="select-user-groups"
                                class="form-control"></select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-default"
                        data-dismiss="modal">Fechar</button>
                <button type="button"
                        class="btn btn-primary"
                        id="store-user-groups">Adicionar grupos</button>
            </div>
        </div>
    </div>
</div>
