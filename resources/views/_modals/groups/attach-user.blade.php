<div class="modal fade" tabindex="-1" role="dialog" id="assign-users-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Adiconar grupo a usuário<span id="user-name"></span></h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="user_id">Selecione o grupo:</label>
                        <select name="group_id"
                                class="form-control"
                                disabled
                                id="select-groups-1">
                        </select>
                        <small id="error-group-id"></small>
                    </div>
                    <div class="form-group">
                        <label for="permissions">Selecione os usuários:</label>
                        <select name="users[]"
                                multiple="multiple"
                                style="width: 100%"
                                id="users"
                                class="form-control"></select>
                        <small id="error-users"></small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-default"
                        data-dismiss="modal">Fechar</button>
                <button type="button"
                        class="btn btn-primary"
                        id="store-group-permissions">Adicionar grupos</button>
            </div>
        </div>
    </div>
</div>
