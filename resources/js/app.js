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

