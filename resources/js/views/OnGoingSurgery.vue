<template>
    <div>
        <stopwatch
            v-if="this.surgery.started && !this.surgery.outOfSurgeryCenter"
            title="Tempo de cirurgia decorrido: "
            :finished="this.surgery.finished"
            :current-timer="this.surgery.duration"></stopwatch>

        <div v-if="!this.surgery.outOfSurgeryCenter && !this.surgery.intercurrence">
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-block"
                            @click="confirmEntranceAtSurgeryCenter"
                            id="entrance-surgery-center"
                            :disabled="shouldDisableEntranceAtSurgeryCenterButton()"
                            :class="shouldDisableEntranceAtSurgeryCenterButton() ? '' : 'btn-primary'">
                        1. Entrou no centro cirúrgico
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-block"
                            @click="confirmEntranceAtSurgicalRoom"
                            :disabled="shouldDisableEntranceAtSurgicalRoomButton()"
                            :class="shouldDisableEntranceAtSurgicalRoomButton() ? '' : 'btn-primary'">
                        2. Entrou na sala cirúrgica
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-block"
                            @click="confirmTimeout"
                            :disabled="shouldDisableTimeoutButton()"
                            :class="shouldDisableTimeoutButton() ? '' : 'btn-primary'">
                        3. Time out realizado!
                    </button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-block"
                            :class="shouldDisableAnestheticInductionButton() ? '' : 'btn-primary'"
                            :disabled="shouldDisableAnestheticInductionButton()"
                            @click="confirmAnestheticInduction">
                        4. Indução anestésica realizada
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-block"
                            :class="shouldDisableStartSurgeryButton() ? '' : 'btn-primary'"
                            :disabled="shouldDisableStartSurgeryButton()"
                            @click="startSurgery">
                        5. Cirurgia Iniciada!
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-block"
                            :class="shouldDisableFinishSurgeryButton() ? '' : 'btn-primary'"
                            :disabled="shouldDisableFinishSurgeryButton()"
                            @click="finishSurgery"
                            id="surgery-ended">
                        6. Cirurgia terminada!
                    </button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-block"
                            :class="shouldDisableSurgicalRoomExitButton() ? '' : 'btn-primary'"
                            :disabled="shouldDisableSurgicalRoomExitButton()"
                            @click="confirmSurgicalRoomExit"
                            id="exit-surgical-room">
                        7. Saiu da sala cirúrgica
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-block"
                            :class="shouldDisableEntranceAtRepaiButton() ? '' : 'btn-primary'"
                            :disabled="shouldDisableEntranceAtRepaiButton()"
                            @click="confirmEntranceAtRepai"
                            id="entrance-repai">
                        8. Entrada na REPAI
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-block"
                            @click="confirmExitOfRepai"
                            :class="shouldDisableExitOfRepaiButton() ? '' : 'btn-primary'"
                            :disabled="shouldDisableExitOfRepaiButton()"
                            id="exit-repai">
                        9. Saída da REPAI
                    </button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-block"
                            @click="confirmSurgeryCenterExit"
                            :class="shouldDisableSurgeryCenterExitButton() ? '' : 'btn-primary'"
                            :disabled="shouldDisableSurgeryCenterExitButton()"
                            id="exit-surgical-center">
                        9. Saída do centro cirúrgico
                    </button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 col-md-push-3 col-md-pull-3">
                    <router-link :to="{ name:'events.intercurrence', params: { eventId } }">
                        <button class="btn btn-danger btn-block">Intercorrência cirúrgica</button>
                    </router-link>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <router-view></router-view>
                </div>
            </div>

        </div>

        <alert-component
            v-if="surgery.finished && surgery.outOfSurgeryCenter"
            message="Cirurgia finalizada com sucesso!"
            alert="alert-success">
        </alert-component>
        <alert-component
            v-on:has-intercurrence="_hasIntercurrence()"
            v-if="surgery.intercurrence"
            message="Intercorrência cirúrgica registrada."
            alert="alert-warning">
        </alert-component>
        <report v-if="surgery.finished && surgery.outOfSurgeryCenter" :event-id="eventId"></report>
    </div>
</template>

<script>
    import Pusher from 'pusher-js'
    import Stopwatch from '@components/Stopwatch'
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
                surgery: {
                    started: false,
                    startedAt: null,
                    duration: null,
                    finished: false,
                    isAtSurgeryCenter: false,
                    isAtSurgicalRoom: false,
                    repaiStarted: false,
                    timeoutDone: false,
                    anestheticInduction: false,
                    intercurrence: false,
                    outOfRepai: false,
                    outOfSurgeryCenter: false,
                    outOfSurgicalRoom: false,
                }
            }
        },
        mounted() {
            let pusher = new Pusher(process.env.MIX_PUSHER_APP_KEY, {
                cluster: process.env.MIX_PUSHER_APP_CLUSTER,
                encrypted: false,
            });

            // Pusher.logToConsole = true;
            let self = this;
            this.surgeryStatus();

            this.$root.$on('has-intercurrence', function() {
                self._hasIntercurrence();
            });
            let anestheticInduction = pusher.subscribe('anesthetic-induction');
            let entranceAtRepai = pusher.subscribe('entrance-at-repai');
            let entranceAtSurgeryCenter = pusher.subscribe('entrance-at-surgery-center');
            let entranceAtSurgicalRoom = pusher.subscribe('entrance-at-surgical-room');
            let exitOfRepai = pusher.subscribe('exit-of-repai');
            let surgeryFinished = pusher.subscribe('surgery-finished');
            let surgeryStarted = pusher.subscribe('surgery-started');
            let surgicalCenterExit = pusher.subscribe('exit-of-surgical-center');
            let surgicalIntercurrence = pusher.subscribe('surgical-intercurence');
            let surgicalRoomExit = pusher.subscribe('surgical-room-exit');
            let timeoutDone = pusher.subscribe('timeout-done');


            entranceAtSurgeryCenter.bind('entrance-at-surgery-center', (data) => {
                this.surgeryStatus();
            });
            entranceAtSurgicalRoom.bind('entrance-at-surgical-room', (data) => {
                this.surgeryStatus();
            });
            timeoutDone.bind('timeout-done', (data) => {
               this.surgeryStatus();
            });
            anestheticInduction.bind('anesthetic-induction', (data) => {
               this.surgeryStatus();
            });
            surgeryStarted.bind('surgery-started', (data) => {
               this.surgeryStatus();
            });
            surgeryFinished.bind('surgery-finished', (data) => {
               this.surgeryStatus();
            });
            surgicalRoomExit.bind('surgical-room-exit', (data) => {
               this.surgeryStatus();
            });
            entranceAtRepai.bind('entrance-at-repai', (data) => {
               this.surgeryStatus();
            });
            exitOfRepai.bind('exit-of-repai', (data) => {
                this.surgeryStatus();
            });
            surgicalCenterExit.bind('exit-of-surgical-center', (data) => {
                this.surgeryStatus();
            });
            surgicalIntercurrence.bind('surgical-intercurrence', (data) => {
               this.surgeryStatus();
            });

        },

        methods: {
            _hasIntercurrence() {
              this.surgery.intercurrence = true;
            },

            async surgeryStatus() {
                await axios.get(`/api/surgeries/stats/${this.eventId}/started`)
                    .then((response) => {
                        if (response.status === HTTP_OK) {
                            this.surgery.started             = response.data.data.started;
                            this.surgery.startedAt           = response.data.data.startedAt;
                            this.surgery.duration            = response.data.data.duration;
                            this.surgery.finished            = response.data.data.finished;
                            this.surgery.isAtSurgeryCenter   = response.data.data.isAtSurgeryCenter;
                            this.surgery.isAtSurgicalRoom    =  response.data.data.isAtSurgicalRoom;
                            this.surgery.repaiStarted        = response.data.data.repaiStarted;
                            this.surgery.timeoutDone         = response.data.data.timeoutDone;
                            this.surgery.intercurrence       = response.data.data.intercurrence;
                            this.surgery.outOfRepai          = response.data.data.outOfRepai;
                            this.surgery.outOfSurgeryCenter  = response.data.data.outOfSurgeryCenter;
                            this.surgery.outOfSurgicalRoom   = response.data.data.outOfSurgicalRoom;
                            this.surgery.anestheticInduction = response.data.data.anestheticInduction;
                        } else {
                            swal({
                                icon: 'error',
                                title: 'Ops...',
                                text: 'Não foi possível carregar os dados da cirurgia!',
                                timer: 5000,
                            });
                        }
                    });
            },

            /**
             * Dtermine when to show the entrance at surgery center button.
             * @returns {boolean}
             */
            shouldDisableEntranceAtSurgeryCenterButton() {
                return this.surgery.started
                    || this.surgery.finished
                    || this.surgery.outOfRepai
                    || this.surgery.isAtSurgeryCenter;
            },

            /**
             * Confirm the surgery center entrance.
             */
            confirmEntranceAtSurgeryCenter() {
                axios.put(`/api/surgeries/manage/${this.eventId}/entrance-at-surgery-center`)
                    .then((response) => {
                       swal({
                           icon: response.data.data.swal.icon,
                           title: response.data.data.swal.title,
                           text: response.data.data.swal.text,
                           timer: response.data.data.swal.timer,
                       });
                        if (response.status === HTTP_OK)
                            this.surgery.isAtSurgeryCenter = true;
                    });
            },

            /**
             * @returns {boolean}
             */
            shouldDisableEntranceAtSurgicalRoomButton() {
                if (! this.surgery.isAtSurgeryCenter
                    || this.surgery.started
                    || this.surgery.finished
                    || this.surgery.isAtSurgicalRoom
                    || this.outOfRepai
                )
                    return true;
                return false;
            },
            confirmEntranceAtSurgicalRoom() {
                axios.put(`/api/surgeries/manage/${this.eventId}/surgical-room-entrance`)
                    .then((response) => {
                        swal({
                            icon: response.data.data.swal.icon,
                            title: response.data.data.swal.title,
                            text: response.data.data.swal.text,
                            timer: response.data.data.swal.timer,
                        });
                        if (response.status === HTTP_OK)
                            this.surgery.isAtSurgicalRoom = true;
                    });
            },

            /**
             * Determine when to show the timeout button
             * @returns {boolean}
             */
            shouldDisableTimeoutButton() {
                if (
                    this.surgery.finished
                    || !this.surgery.isAtSurgicalRoom
                    || ! this.surgery.isAtSurgeryCenter
                    || this.surgery.timeoutDone
                    || this.surgery.anestheticInduction
                )
                    return true;
                return false;
            },

            /**
             * Confirm the timeout.
             */
            confirmTimeout() {
                axios.put(`/api/surgeries/manage/${this.eventId}/timeout`)
                    .then((response) => {
                        swal({
                            icon: response.data.data.swal.icon,
                            title: response.data.data.swal.title,
                            text: response.data.data.swal.text,
                            timer: response.data.data.swal.timer,
                        });
                        if (response.status === HTTP_OK)
                            this.surgery.timeoutDone = true;
                    });
            },

            /**
             * Determine when to show the anesthetic induction button.
             * @returns {boolean}
             */
            shouldDisableAnestheticInductionButton() {
                if (
                    ! this.surgery.isAtSurgeryCenter
                    || ! this.surgery.isAtSurgicalRoom
                    || this.surgery.anestheticInduction
                )
                    return true;
                return false;
            },

            /**
             * Confirm the anesthetic induction
             */
            confirmAnestheticInduction() {
                axios.put(`/api/surgeries/manage/${this.eventId}/anesthetic-induction`)
                    .then((response) => {
                        swal({
                            icon: response.data.data.swal.icon,
                            title: response.data.data.swal.title,
                            text: response.data.data.swal.text,
                            timer: response.data.data.swal.timer,
                        });
                        if (response.status === HTTP_OK)
                            this.surgery.anestheticInduction = true;
                    });
            },

            /**
             * Determine when to show the start surgery button
             * @returns {boolean}
             */
            shouldDisableStartSurgeryButton() {
                if (
                    ! this.surgery.isAtSurgeryCenter
                    || this.surgery.outOfSurgeryCenter
                    || ! this.surgery.isAtSurgicalRoom
                    || this.surgery.outOfSurgicalRoom
                    || this.surgery.started
                    || this.surgery.finished
                    || ! this.surgery.anestheticInduction
                )
                    return true;
                return false;
            },

            /**
             * Start the surgery and the stopwatch.
             */
            startSurgery() {
                axios.put(`/api/surgeries/manage/${this.eventId}/start`)
                    .then((response) => {
                        swal({
                            icon: response.data.data.swal.icon,
                            title: response.data.data.swal.title,
                            text: response.data.data.swal.text,
                            timer: response.data.data.swal.timer,
                        });
                        if (response.status === HTTP_OK)
                            this.surgery.started = true;
                    });
            },

            /**
             * Determine when to show the finish surgery button.
             * @returns {boolean}
             */
            shouldDisableFinishSurgeryButton() {
                if (
                    ! this.surgery.started
                    || ! this.surgery.isAtSurgeryCenter
                    || ! this.surgery.isAtSurgeryCenter
                    || this.surgery.finished
                )
                    return true;
                return false;
            },

            /**
             * Finish the surgery.
             */
            finishSurgery() {
                axios.put(`/api/surgeries/manage/${this.eventId}/finish`)
                    .then((response) => {
                        swal({
                            icon: response.data.data.swal.icon,
                            title: response.data.data.swal.title,
                            text: response.data.data.swal.text,
                            timer: response.data.data.swal.timer,
                        });
                        if (response.status === HTTP_OK)
                            this.surgery.finished = true;
                    });
            },

            /**
             * Determine when to show the surgical room exit button.
             * @returns {boolean}
             */
            shouldDisableSurgicalRoomExitButton() {
                if (! this.surgery.finished || this.surgery.outOfSurgeryCenter || this.surgery.outOfSurgicalRoom)
                    return true;
                return false;
            },

            /**
             * Confirm the surgical room exit.
             */
            confirmSurgicalRoomExit() {
                axios.put(`/api/surgeries/manage/${this.eventId}/surgical-room-exit`)
                    .then((response) => {
                        swal({
                            icon: response.data.data.swal.icon,
                            title: response.data.data.swal.title,
                            text: response.data.data.swal.text,
                            timer: response.data.data.swal.timer,
                        });
                        if (response.status === HTTP_OK)
                            this.surgery.outOfSurgicalRoom = true;
                    });
            },

            /**
             * Determine when to show the repai button.
             * @returns {boolean}
             */
            shouldDisableEntranceAtRepaiButton() {
                if (!this.surgery.outOfSurgicalRoom || this.surgery.outOfRepai || this.surgery.repaiStarted)
                    return true;
                return false;
            },

            /**
             * Confirm the repai entrance
             */
            confirmEntranceAtRepai() {
                axios.put(`/api/surgeries/manage/${this.eventId}/repai-entrance`)
                    .then((response) => {
                        swal({
                            icon: response.data.data.swal.icon,
                            title: response.data.data.swal.title,
                            text: response.data.data.swal.text,
                            timer: response.data.data.swal.timer,
                        });
                        if (response.status === HTTP_OK)
                            this.surgery.repaiStarted = true;
                    });
            },

            /**
             * Determine when to show the exit of repai button.
             * @returns {boolean}
             */
            shouldDisableExitOfRepaiButton() {
                if (
                    this.surgery.outOfRepai
                    || this.outOfSurgeryCenter
                    || ! this.surgery.repaiStarted
                )
                    return true;
                return false
            },

            /**
             * Confirm the REPAI Exit.
             */
            confirmExitOfRepai() {
                axios.put(`/api/surgeries/manage/${this.eventId}/repai-exit`)
                    .then((response) => {
                        swal({
                            icon: response.data.data.swal.icon,
                            title: response.data.data.swal.title,
                            text: response.data.data.swal.text,
                            timer: response.data.data.swal.timer,
                        });
                        if (response.status === HTTP_OK)
                            this.surgery.outOfRepai = true;
                    });
            },


            shouldDisableSurgeryCenterExitButton() {
                if (
                    ! this.surgery.outOfRepai
                    || this.surgery.outOfSurgeryCenter
                )
                    return true;
                return false;
            },

            /**
             * Confirm the surgery center exit.
             */
            confirmSurgeryCenterExit() {
                axios.put(`/api/surgeries/manage/${this.eventId}/exit-of-surgery-center`)
                    .then((response) => {
                        // swal({
                        //     icon: response.data.data.swal.icon,
                        //     title: response.data.data.swal.title,
                        //     text: response.data.data.swal.text,
                        //     timer: response.data.data.swal.timer,
                        // });

                        if (response.status === HTTP_OK)
                            this.surgery.outOfSurgeryCenter = true;
                    })
            }
        }
    }
</script>

<style scoped>

</style>
