<template>
    <div>
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4 class="box-title">Novas Cirurgias</h4>
            </div>
            <div class="box-body">
                <div id="external-events">
                    <div class="fc-event new-surgery external-event
                                        bg-yellow ui-draggable
                                        ui-draggable-handle"
                         style="border: none"
                         v-for="surgery in this.surgeries"
                         :data-id="surgery.id"
                         :data-title="surgery.patient.name"
                         data-color="#ff0000"
                         :data-event='{duration: convertToTimeString(surgery.estimated_duration_time)}'
                         :data-estimated="surgery.estimated_duration_time"
                         :id="'surgery'+surgery.id">
                        {{ surgery.patient.name }}
                    </div>
                    <div v-if="this.surgeriesWithDeniedMaterials.length != 0">
                        <h4>Cirurgias com materiais negados</h4>
                    </div>
                    <div class="fc-event newCirurgia external-event
                                        bg-red ui-draggable
                                        ui-draggable-handle"
                         style="border: none"
                         v-for="surgery in surgeriesWithDeniedMaterials"
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

    String.prototype.toHHMM = function () {
        var sec_num = parseInt(this, 10);
        var hours   = Math.floor(sec_num / 3600);
        var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
        var seconds = sec_num - (hours * 3600) - (minutes * 60);

        if (hours   < 10) {hours   = "0"+hours;}
        if (minutes < 10) {minutes = "0"+minutes;}
        if (seconds < 10) {seconds = "0"+seconds;}
        return hours+':'+minutes;
    };

    export default {
        name: "SurgeriesToBeScheduled",
        props: [
            'surgeriesWithDeniedMaterials',
            'surgeries',
            'surgeriesInWaitingList'
        ],
        data() {
            return {

            }
        },
        methods: {
            convertToTimeString(hours) {
                let seconds = hours * 3600;
                return seconds.toString().toHHMM().toString();
            }
        }
    }
</script>

<style scoped>

</style>
