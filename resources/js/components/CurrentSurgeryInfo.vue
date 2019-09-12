<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">
                    Dados Gerais
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-center">Dados do paciente</h4>
                <p><b>Nome: </b>{{ patient.name }}</p>
                <p><b>Nome da mãe: </b>{{ patient.mother_name }}</p>
                <p><b>Data de nascimento: </b>{{ birthday_at }}</p>
                <p><b>Gênero: </b>{{ gender }}</p>
                <p><b>Prontuário: </b>{{ patient.medical_record }}</p>
            </div>
            <div class="col-md-6">
                <h4 class="text-center">Dados da cirurgia:</h4>
                <p><b>Procedimento: </b>{{ surgery.procedure.name }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'

    export default {
        name: "CurrentSurgeryInfo",
        props: {
            patient: {
                name: String,
                mother_name: String,
                gender: String,
                birthday_at: String,
                medical_record: String,
            },
            surgery: {
                procedure: String,
            }
        },
        data() {
            return {

            }
        },
        computed: {
            /**
             * Format the patient birthday date.
             * @return {string}
             */
            birthday_at: function () {
                return moment(this.patient.birthday_at).format('DD/MM/YYYY');
            },

            /**
             * Format the patient gender
             * @return {string}
             */
            gender() {
                if (this.patient.gender === 'M')
                    return 'Masculino';
                else if (this.patient.gender === 'F')
                    return 'Feminino';
                else return 'Outro';
            }
        },
    }
</script>

<style scoped>
</style>
