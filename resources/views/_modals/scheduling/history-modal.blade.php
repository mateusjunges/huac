
<!-- Modal -->
<div class="modal" id="history-modal"
     tabindex="-1" role="dialog"
     style="overflow-y: auto"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><b>Histórico de Status da Cirurgia</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table hover table-dark" id="history-table">
                    <thead>
                    <tr>
                        <th scope="col">Status</th>
                        <th scope="col">Alterado por:</th>
                        <th scope="col">Data de alteração</th>
                        <th scope="col">Observação</th>
                    </tr>
                    </thead>
                    <tbody id="history-table-body">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
