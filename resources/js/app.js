require('./bootstrap');

import Vue from 'vue'
import dotenv from 'dotenv'
import VueRouter from 'vue-router'
import Routes from '@routes'

dotenv.config();

// General components
Vue.component('schedule-surgeries', require('@components/SurgeriesToBeScheduled.vue').default);
Vue.component('on-going-surgery', require('@views/OnGoingSurgery.vue').default);
Vue.component('stopwatch', require('@components/Stopwatch.vue').default);
Vue.component('current-surgery-info', require('@components/CurrentSurgeryInfo.vue').default);
Vue.component('alert-component', require('@components/Alert.vue').default);
Vue.component('report', require('@components/Report.vue').default);

// Reports
Vue.component('surgeries-report', require('@report/SurgeriesReport.vue').default);

//Passport components
Vue.component('passport-clients', require('@passport/Clients.vue').default);
Vue.component('passport-authorized-clients', require('@passport/AuthorizedClients.vue').default);
Vue.component('passport-personal-access-tokens', require('@passport/PersonalAccessTokens.vue').default);

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: Routes
});

const app = new Vue({
    el: '#app',
    props: {
        eventId: Number
    },
    data() {
      return {
          finished: false,
          outOfSurgeryCenter: false,
      }
    },
    router,
    mounted() {
      // this.getSurgeryStatus();
    },
    methods: {
        getSurgeryStatus() {
            const param = this.$route.params.surgery;
            axios.get(`/api/surgeries/stats/${param}/root`)
                .then((response) => {
                this.finished = response.data.data.finished;
                this.outOfSurgeryCenter = response.data.data.outOfSurgeryCenter;
            });
        }
    }
});


String.prototype.toHHMMSS = function () {
    var sec_num = parseInt(this, 10);
    var hours   = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    return hours+':'+minutes+':'+seconds;
};


