require('./bootstrap');

import Vue from 'vue'
import dotenv from 'dotenv'

dotenv.config();

Vue.component('schedule-surgeries', require('@components/SurgeriesToBeScheduled.vue').default);

Vue.component('passport-clients', require('@passport/Clients.vue').default);
Vue.component('passport-authorized-clients', require('@passport/AuthorizedClients.vue').default);
Vue.component('passport-personal-access-tokens', require('@passport/PersonalAccessTokens.vue').default);

const app = new Vue({
    el: '#app',
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


