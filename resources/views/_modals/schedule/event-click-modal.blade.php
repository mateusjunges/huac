<div class="modal" tabindex="-1"
     role="dialog"
     id="event-click-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Detalhes da cirurgia</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Dados do paciente:</h4>

                        <p><b>Paciente: </b><span id="patient-name"></span></p>
                        <p><b>Prontuário: </b><span id="medical-record"></span></p>
                        <p><b>Data de nascimento: </b><span id="birthday-at"></span></p>
                        <p><b>Gênero: </b><span id="gender"></span></p>

                        <h4>Dados da cirurgia:</h4>

                        <p><b>Cirurgião principal: </b><span id="head-surgeon"></span></p>
                        <p><b>Cirurgião auxiliar: </b><span id="assistant-surgeon"></span></p>
                        <p><b>Anestesia: </b><span id="anesthesia"></span></p>
                        <p><b>Procedimento: </b><span id="procedure"></span></p>
                        <p><b>Materiais: </b><span id="materials"></span></p>

                        <hr>

                        <p><b>Status: </b><span id="status"></span></p>
                        <p><b>Observação: </b><span id="observation"></span></p>
                        <p><b>Avaliação anestésica: </b><span id="anesthetic-evaluation"></span></p>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary btn-block change-room" id="change-room">
                                    Mudar Sala
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary btn-block" id="change-date">
                                    <i class="fa fa-calendar"></i> Alterar data
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary btn-block" id="history-button">
                                    <i class="fa fa-history"></i> Histórico
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button type="button" id="update-status" class="btn btn-primary btn-block">
                                    Alterar Status
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary btn-block edit-surgery">
                                    <i class="fa fa-edit"></i> Editar
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary btn-block" id="delete">
                                    <i class="fa fa-trash"></i> Cancelar
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="" id="start-surgery-link">
                                    <button type="button" class="btn btn-primary btn-block" id="start-surgery">
                                        <i class="fa fa-play-circle"></i> Iniciar cirurgia
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-default  btn-block" data-dismiss="modal">
                            <i class="fa fa-times"></i> Fechar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
