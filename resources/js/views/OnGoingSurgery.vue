<template>
    <div>
        <stopwatch
            v-if="this.surgery.started"
            title="Tempo de cirurgia decorrido: "
            :finished="this.surgery.finished"
            :current-timer="this.surgery.duration"></stopwatch>

        <div>
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
                    <router-link :to="{ name:'intercurrence.manage', params: { eventId } }">
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
                surgery: {
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
                    outOfSurgeryCenter: false,
                    outOfSurgicalRoom: false,
                }
            }
        },
        mounted() {
            let self = this;
            this.surgeryStatus();
        },

        methods: {
            async surgeryStatus() {
                await axios.get(`/api/surgeries/stats/${this.eventId}`)
                    .then((response) => {
                        if (response.status === HTTP_OK) {
                            this.surgery.started            = response.data.data.started;
                            this.surgery.startedAt          = response.data.data.startedAt;
                            this.surgery.duration           = response.data.data.duration;
                            this.surgery.finished           = response.data.data.finished;
                            this.surgery.isAtSurgeryCenter  = response.data.data.isAtSurgeryCenter;
                            this.surgery.isAtSurgical_room  = response.data.data.isAtSurgicalRoom;
                            this.surgery.repaiStarted       = response.data.data.repaiStarted;
                            this.surgery.timeoutDone        = response.data.data.timeoutDone;
                            this.surgery.intercurrence      = response.data.data.intercurrence;
                            this.surgery.outOfRepai         = response.data.data.outOfRepai;
                            this.surgery.outOfSurgeryCenter = response.data.data.outOfSurgeryCenter;
                            this.surgery.outOfSurgicalRoom  = response.data.data.outOfSurgicalRoom;
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
            confirmEntranceAtSurgeryCenter() {

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

            },

            /**
             * Determine when to show the timeout button
             * @returns {boolean}
             */
            shouldDisableTimeoutButton() {
                if (
                    this.surgery.finished
                    || this.surgery.isAtSurgicalRoom
                    || ! this.surgery.isAtSurgeryCenter
                    || this.surgery.timeoutDone
                    || this.surgery.anestheticInduction
                )
                    return true;
                return false;
            },
            confirmTimeout() {

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
            confirmAnestheticInduction() {

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
                    || this.anestheticInduction
                )
                    return true;
                return false;
            },
            startSurgery() {

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
            finishSurgery() {

            },

            /**
             * Determine when to show the surgical room exit button.
             * @returns {boolean}
             */
            shouldDisableSurgicalRoomExitButton() {
                if (! this.surgery.finished || this.surgery.outOfSurgeryCenter)
                    return true;
                return false;
            },
            confirmSurgicalRoomExit() {

            },

            /**
             * Determine when to show the repai button.
             * @returns {boolean}
             */
            shouldDisableEntranceAtRepaiButton() {
                if (!this.surgery.outOfSurgicalRoom || this.surgery.outOfRepai)
                    return true;
                return false;
            },
            confirmEntranceAtRepai() {

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
            confirmExitOfRepai() {

            },


            shouldDisableSurgeryCenterExitButton() {
                if (
                    ! this.outOfRepai
                    || this.outOfSurgeryCenter
                )
                    return true;
                return false;
            },
            confirmSurgeryCenterExit() {

            }
        }
    }
</script>

<style scoped>

</style>
