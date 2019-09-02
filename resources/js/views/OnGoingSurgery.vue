<template>
    <div>
        <stopwatch></stopwatch>
    </div>
</template>

<script>
    import Stopwatch from '@components/Stopwatch'
    import Intercurrence from '@views/Intercurrence'
    import axios from 'axios'

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
                surgery: {
                    started: false,
                    started_at: null,
                    duration: null,
                    finished: false,
                    is_at_surgery_center: false,
                    is_at_surgical_room: false,
                    out_of_surgical_room: false,
                    repai_finished: false,
                    timeout_done: false,
                    anesthetic_induction: false,
                    intercurrence: false,
                    out_of_repai: false,
                },
            }
        },
        methods: {
            surgeryStatus() {

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
