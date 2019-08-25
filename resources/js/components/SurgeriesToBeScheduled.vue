<template>
    <div>
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4 class="box-title">Novas Cirurgias</h4>
            </div>
            <div class="box-body">
                <div id="external-events">
                    <div class="fc-event newCirurgia external-event
                                        bg-red ui-draggable
                                        ui-draggable-handle"
                         style="border: none"
                         v-for="surgery in surgeriesWithoutMaterials"
                         :data-id="surgery.id"
                         :data-title="surgery._paciente.nome"
                         data-color="#ff0000"
                         :data-estimated="surgery.estimated_duration_time"
                         :id="'surgery'+surgery.id">
                        {{ surgery.patient.name }}
                    </div>
                    <div class="fc-event new-surgery external-event
                                        bg-yellow ui-draggable
                                        ui-draggable-handle"
                         style="border: none"
                         v-for="surgery in this.surgeries"
                         :data-id="surgery.id"
                         :data-title="surgery.patient.name"
                         data-color="#ff0000"
                         :data-estimated="surgery.estimated_duration_time"
                         :id="'surgery'+surgery.id">
                        {{ surgery.patient.name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import $ from 'jquery'
 

    export default {
        name: "SurgeriesToBeScheduled",
        props: {
            surgeriesWithoutMaterials: Array,
            surgeries: Array,
            surgeriesInWaitingList: Array

        },
        data() {
            return {

            }
        },
        methods: {

        }
    }
</script>

<style scoped>

</style>
