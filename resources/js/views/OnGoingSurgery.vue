<template>
    <div>
        <stopwatch></stopwatch>
    </div>
</template>

<script>
    import Stopwatch from '@components/Stopwatch'
    import Intercurrence from '@views/Intercurrence'
    import axios from 'axios'

    const HTTP_OK = 200;

    export default {
        name: "OnGoingSurgery",
        props: {
            eventId: Number,
        },
        components: {
            Stopwatch,
        },
        data() {
            return {
                    started: false,
                    started_at: null,
                    duration: null,
                    finished: false,
                    isAtSurgeryCenter: false,
                    isAtSurgicalRoom: false,
                    repaiStarted: false,
                    timeoutDone: false,
                    anestheticInduction: false,
                    intercurrence: false,
                    outOfRepai: false,
            }
        },
        methods: {
            async surgeryStatus() {
                await axios.get(`/api/surgeries/stats/${this.eventId}`)
                    .then((response) => {
                        if (response.status === HTTP_OK) {

                            this.started = response.data.started;
                            this.startedAt = response.data.startedAt;
                            this.duration = response.data.duration;
                            this.finished = response.data.finished;
                            this.isAtSurgeryCenter = response.data.isAtSurgeryCenter;
                            this.isAtSurgical_room = response.data.isAtSurgicalRoom;
                            this.repaiStarted = response.data.repaiStarted;
                            this.timeoutDone = response.data.timeoutDone;
                            this.intercurrence = response.data.intercurrence;
                            this.outOfRepai = response.data.outOfRepai;
                        } else {
                            swal({
                                icon: 'error',
                                title: 'Ops...',
                                text: 'Não foi possível carregar os dados da cirurgia!',
                                timer: 5000,
                            });
                        }
                    });
            }
        },
        mounted() {
            let self = this;
            this.surgeryStatus();
        }
    }
</script>

<style scoped>

</style>
