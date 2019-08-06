require('./bootstrap');

import Vue from 'vue'
import dotenv from 'dotenv'

dotenv.config();

Vue.component('create-surgery', require('@components/CreateSurgeryComponent.vue').default);

Vue.component('passport-clients', require('@passport/Clients.vue').default);
Vue.component('passport-authorized-clients', require('@passport/AuthorizedClients.vue').default);
Vue.component('passport-personal-access-tokens', require('@passport/PersonalAccessTokens.vue').default);

const app = new Vue({
    el: '#app',
});

