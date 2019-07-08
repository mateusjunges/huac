<template>
    <div class="box box-success">
        <div class="box-header">
            <h4>Nova cirurgia</h4>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="patient-name">Nome do paciente:</label>
                        <input type="text"
                               id="patient-name"
                               name="name"
                               v-model="name"
                               placeholder="Informe o nome do paciente"
                               v-bind:class="patientNameClass"
                               class="form-control">
                        <span class="text-danger">{{ this.patientNameErrors }}</span>
                    </div>
                    <div class="form-group">
                        <label for="medical-record">Número do prontuário:</label>
                        <input type="text"
                               name="medical_record"
                               id="medical-record"
                               v-model="medicalRecord"
                               placeholder="Informe o prontuário do paciente"
                               v-bind:class="medicalRecordClass"
                               class="form-control">
                        <span class="text-danger">{{ this.medicalRecordErrors }}</span>
                    </div>
                    <div class="form-group">
                        <label for="mother-name">Nome da mãe:</label>
                        <input type="text"
                               id="mother-name"
                               name="mother_name"
                               v-model="motherName"
                               placeholder="Informe o nome da mãe do paciente"
                               v-bind:class="motherNameClass"
                               class="form-control">
                        <span class="text-danger">{{ this.motherNameErrors }}</span>
                    </div>
                    <div class="form-group">
                        <label for="birthday-at">Data de nascimento:</label>
                        <input type="date"
                               name="birthday_at"
                               v-model="birthdayAt"
                               v-bind:class="birthdayAtClass"
                               placeholder="Informe a data de nascimento:"
                               id="birthday-at"
                               class="form-control">
                        <span class="text-danger">{{ this.birthdayAtErrors }}</span>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gênero:</label>
                        <select name="gender"
                                id="gender"
                                v-model="patientGender"
                                v-bind:class="genderClass"
                                class="form-control">
                            <option value="">Selecione o gênero:</option>
                            <option v-for="gender in genderList" :value="gender.id">{{ gender.name }}</option>
                        </select>
                        <span class="text-danger">{{ this.genderErrors }}</span>
                    </div>
                    <div class="text-center">
                        <b>Dados da cirurgia</b>
                    </div>
                    <div class="form-group">
                        <label for="surgical-procedure">Procedimento cirúrgico:</label>
                        <select name="procedure_id"
                                id="surgical-procedure"
                                v-model="procedure"
                                v-bind:class="surgicalProcedureClass"
                                class="form-control">
                            <option value="">Selecione o procedimento cirúrgico:</option>
                            <option v-for="procedure in procedures" :value="procedure.id">{{ procedure.name }}</option>
                        </select>
                        <span class="text-danger">{{ this.procedureErrors }}</span>
                    </div>
                    <div class="form-group">
                        <label for="estimated-duration">Tempo de duração estimado:</label>
                        <select name="estimated_duration"
                                id="estimated-duration"
                                v-model="duration"
                                v-bind:class="estimatedDurationClass"
                                class="form-control">
                            <option value="">Selecione o tempo de duração estimado:</option>
                            <option v-for="duration in estimatedDuration" :value="duration">{{ duration }}</option>
                        </select>
                        <span class="text-danger">{{ this.estimatedDurationErrors }}</span>
                    </div>
                    <div class="form-group">
                        <label for="classification_id">Classificação:</label>
                        <select name="classification_id"
                                id="classification_id"
                                v-model="classification"
                                v-bind:class="classificationClass"
                                class="form-control">
                            <option value="">Classifique esta cirurgia:</option>
                            <option v-for="classification in classifications" :value="classification.id">{{ classification.name }}</option>
                        </select>
                        <span class="text-danger">{{ this.classificationErrors }}</span>
                    </div>
                    <div class="form-group">
                        <label for="anesthesia">Anestesia:</label>
                        <select name="anesthesia_id"
                                id="anesthesia"
                                v-model="anesthesia"
                                v-bind:class="anestheticsClass"
                                class="form-control">
                            <option value="">Selecione a anestesia:</option>
                            <option v-for="anesthesia in anesthetics" :value="anesthesia.id">{{ anesthesia.name }}</option>
                        </select>
                        <span class="text-danger">{{ this.anestheticsErrors }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="head-surgeon">Cirurgião principal:</label>
                        <select name="head_surgeon"
                                class="form-control"
                                v-model="headSurgeon"
                                v-bind:class="headSurgeonClass"
                                id="head-surgeon">
                            <option value="">Selecione o cirurgião principal:</option>
                            <option v-for="surgeon in surgeons" :value="surgeon.id">{{ surgeon.name }}</option>
                        </select>
                        <span class="text-danger">{{ this.headSurgeonErrors }}</span>
                    </div>
                    <div class="form-group">
                        <label for="assistant-surgeon">Cirurgião auxiliar:</label>
                        <select name="assistant_surgeon"
                                class="form-control"
                                v-model="assistantSurgeon"
                                v-bind:class="assistantSurgeonClass"
                                id="assistant-surgeon">
                            <option value="">Selecione o cirurgião auxiliar:</option>
                            <option v-for="surgeon in surgeons" :value="surgeon.id">{{ surgeon.name }}</option>
                        </select>
                        <span class="text-danger">{{ this.assistantSurgeonErrors }}</span>
                    </div>
                    <div class="form-group">
                        <label for="materials">Materiais solicitados:</label>
                        <textarea name="materials"
                                  id="materials"
                                  cols="30"
                                  v-model="materials"
                                  placeholder="Informe os materiais solicitados:"
                                  rows="10"
                                  v-bind:class="materialsClass"
                                  class="form-control"></textarea>
                        <span class="text-danger">{{ this.materialsErrors }}</span>
                    </div>
                    <div class="form-group">
                        <label for="observation">Observação:</label>
                        <textarea
                            id="observation"
                            cols="30"
                            rows="5"
                            v-model="observation"
                            placeholder="Possui alguma observação?"
                            v-bind:class="observationClass"
                            class="form-control"
                            name="observation"></textarea>
                        <span class="text-danger">{{ this.observationErrors }}</span>
                    </div>
                    <div class="form-group">
                        <label for="anesthetic-evaluation">Avaliação anestésica:</label>
                        <textarea
                            id="anesthetic-evaluation"
                            cols="30"
                            rows="5"
                            v-model="anestheticEvaluation"
                            placeholder="Avaliação anestésica"
                            v-bind:class="anestheticEvaluationClass"
                            class="form-control"
                            name="observation"></textarea>
                        <span class="text-danger">{{ this.anestheticEvaluationErrors }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <button class="btn btn-success btn-lg btn-block"
                    :disabled="!validated"
                >Cadastrar</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateSurgeryComponent",
        props: {
            genderList: Array,
            procedures: Array,
            classifications: Array,
            anesthetics: Array,
            surgeons: Array,
        },
        data(){
            return {
                patientNameErrors: null,
                medicalRecordErrors: null,
                motherNameErrors: null,
                birthdayAtErrors: null,
                genderErrors: null,
                procedureErrors: null,
                estimatedDurationErrors: null,
                classificationErrors: null,
                anestheticsErrors: null,
                headSurgeonErrors: null,
                assistantSurgeonErrors: null,
                materialsErrors: null,
                observationErrors: null,
                anestheticEvaluationErrors: null,

                //Form variables for validation:
                name: '',
                medicalRecord: '',
                birthdayAt: '',
                motherName: '',
                patientGender: '',
                procedure: '',
                duration: '',
                classification: '',
                anesthesia: '',
                headSurgeon: '',
                assistantSurgeon: '',
                materials: '',
                observation: '',
                anestheticEvaluation: '',
                validated: false,
                estimatedDuration: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23],
            }
        },
        methods: {
            validateFullName(name){
                const regex = /^[a-zA-Z]+ [a-zA-Z]+$/;
                return regex.test(name);
            }
        },
        computed: {
            /**
             * Validate the patient name field.
             * @returns {string}
             */
            patientNameClass: function () {
                if (!this.validateFullName(this.name)){
                    this.validated = false;
                    return 'validation-error';
                }else {
                    if (this.name.length < 5){
                        this.validated = false;
                        return 'validation-error';
                    }else {
                        this.validated = true;
                        return 'validated';
                    }
                }
            },

            /**
             * Validate the medical record field;
             * @returns {string}
             */
            medicalRecordClass(){
                if (this.medicalRecord.length < 3){
                    this.validated = false;
                    return 'validation-error';
                }else{
                    this.validated = true;
                    return 'validated';
                }
            },

            /**
             * Validate the mother name field.
             * @returns {string}
             */
            motherNameClass(){
                if (!this.validateFullName(this.motherName)){
                    this.validated = false;
                    return 'validation-error';
                } else {
                    if (this.motherName.length < 5){
                        this.validated = false;
                        return 'validation-error';
                    } else {
                        this.validated = true;
                        return 'validated';
                    }
                }
            },
            
            birthdayAtClass(){

            },
            genderClass(){

            },
            surgicalProcedureClass(){

            },
            estimatedDurationClass(){

            },
            classificationClass(){

            },
            anestheticsClass(){

            },
            headSurgeonClass(){

            },
            assistantSurgeonClass(){

            },
            materialsClass(){

            },
            observationClass(){

            },
            anestheticEvaluationClass(){
                if (this.anestheticEvaluation.length === 0)
                    return 'validated';
                else {

                }
            }
        }
    }
</script>

<style scoped>
    .validation-error {
        border: solid 1px #ff0000;
    }
    .validated {
        border: solid 1px green;
    }
</style>
