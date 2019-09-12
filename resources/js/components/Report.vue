<template>
    <div>
        <div class="row">
            <div class="col-md-10 col-md-pull-1 col-md-push-1">
                <h2>Dados da cirurgia:</h2>
                <div class="col-md-12">
                    <p>Paciente: <span>{{ this.patient.name }}</span></p>
                    <p>Cirurgião principal: <span>{{ this.surgery.surgeons.head_surgeon.name }}</span></p>
                    <p>Timeout realizado: <span>{{ this.surgery.timeout }}</span></p>
                    <p>Tempo de duração: <span>{{ this.surgery.duration.toString().toHHMMSS()  }}</span></p>
                    <p>Duração da anestesia: <span>{{ this.surgery.anesthetic_duration.toString().toHHMMSS() }}</span></p>
                    <p>Tempo de permanência na sala cirúrgica: <span>{{ this.surgery.time_at_surgical_room.toString().toHHMMSS() }}</span></p>
                    <p>Tempo de permanência na REPAI: <span>{{ this.surgery.time_at_repai.toString().toHHMMSS() }}</span></p>
                    <p>Tempo de permanência no centro cirúrgico: <span>{{ this.surgery.time_at_surgery_center.toString().toHHMMSS() }}</span></p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import moment from 'moment'

    const HTTP_OK = 200;

    export default {
        name: "Report",
        props: {
            eventId: Number,
        },

        data() {
            return {
                surgery: {
                    surgeons: {
                        head_surgeon: {
                            name: null,
                        },
                    },
                    timeout: null,
                    duration: '',
                    anesthetic_duration: '',
                    time_at_surgical_room: '',
                    time_at_repai: '',
                    time_at_surgery_center: '',
                    procedure: {
                        name: null,
                        sus_code: null,
                    }
                },

                patient: {
                    name: null,
                }
            }
        },
        async mounted() {
          await this.getData();
        },
        methods: {
            async getData() {
                await axios.get(`/api/surgeries/stats/${this.eventId}/finished`)
                    .then((response) => {
                        if (response.status !== HTTP_OK)
                            swal({
                                icon: response.data.data.swal.icon,
                                title: response.data.data.swal.title,
                                text: response.data.data.swal.text,
                                timer: response.data.data.swal.timer
                            });

                        const data = response.data.data;

                        this.surgery.duration = data.surgery.duration;
                        this.surgery.anesthetic_duration = data.surgery.anesthetic_duration;
                        this.surgery.time_at_surgery_center = data.surgery.time_at_surgery_center;
                        this.surgery.time_at_repai = data.surgery.time_at_repai;
                        this.surgery.time_at_surgical_room = data.surgery.time_at_surgical_room;
                        this.surgery.surgeons.head_surgeon = data.surgery.surgeons.head_surgeon;
                        this.surgery.procedure.name = data.procedure.name;
                        this.surgery.procedure.sus_code = data.procedure.sus_code;
                        this.surgery.timeout = moment(data.surgery.timeout).format('DD/MM/YYYY hh:mm:ss');
                        this.patient.name = data.patient.name;
                    });
            }
        },
    }
</script>

<style scoped>
    p {
        font-size: 1.7rem;
        font-weight: bold;
    }
    p > span{
        float: right;
        font-weight: normal;
        text-transform: lowercase;
    }
    p>span::first-letter{
        text-transform: capitalize;
    }

</style>
