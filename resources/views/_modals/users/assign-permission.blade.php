<div class="modal fade" tabindex="-1" role="dialog" id="assign-permissions-to-user-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Adiconar permissões ao usuário <span id="group-name"></span></h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="user_id">Selecione o usuário:</label>
                        <select name="user"
                                class="form-control"
                                disabled
                                id="select-users">
                        </select>
                        <small id="error-user"></small>
                    </div>
                    <div class="form-group">
                        <label for="permissions">Selecione as permissões:</label>
                        <select name="permissions[]"
                                multiple="multiple"
                                style="width: 100%"
                                id="permissions"
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
                        id="store-user-permissions">Adicionar permissões</button>
            </div>
        </div>
    </div>
</div>
