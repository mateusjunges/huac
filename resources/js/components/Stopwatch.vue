<template>
    <div class="row">
        <div class="text-center">
            <div class="row">
                <div class="col-md-6">
                    <div id="title">
                        <span class="title">{{ title }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="timer">
                        <span id="hours">{{ hours }}</span>
                        <span id="middle-hour">:</span>
                        <span id="minutes">{{ minutes }}</span>
                        <span id="middle">:</span>
                        <span id="seconds">{{ seconds }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    #timer {
        font-size: 24px;
        margin-bottom: 40px;
    }
    #title {
        font-size: 24px;
    }
</style>

<script>
    export default {
        props: {
            currentTimer: Number,
            title: String,
            finished: Boolean
        },
        data() {
            return {
                timer: null,
                totalTime: 0,
            }
        },
        methods: {
            startTimer: function() {
                this.totalTime = this.currentTimer;
                this.timer = setInterval(
                    () => this.counter(),
                    1000
                );
            },
            /**
             * Stop the timer.
             */
            stopTimer: function() {
                clearInterval(this.timer);
                this.timer = null;
            },
            /**
             * Format the timer to be displayed
             * @param time
             * @return {string}
             */
            padTime: function(time) {
                return (time < 10 ? '0' : '') + time;
            },
            /**
             * Increment the counter.
             */
            counter: function() {
                if(this.totalTime >= 0){
                    this.totalTime++;
                }
            },
            /**
             * Stop the timer
             */
            stopTimer: function() {
                clearInterval(this.timer);
                this.timer = null;
            },
        },
        computed: {
            minutes: function() {
                const minutes = Math.floor((this.totalTime - (this.hours * 3600)) / 60);
                return this.padTime(minutes);
            },
            seconds: function() {
                const seconds = Math.floor(this.totalTime - (this.minutes * 60) - (this.hours * 3600));
                return this.padTime(seconds);
            },
            hours: function () {
                const hours = Math.floor(this.totalTime/3600);
                return this.padTime(hours);
            },
        },
        watch: {
            finished: function (newValue, oldValue) {
                if (newValue === true)
                    this.stopTimer();
            }
        },
        mounted() {
            if (this.currentTimer >= 0){
                this.startTimer();
            }
            if (this.finished){
                this.stopTimer();
            }
        },
    }
</script>

