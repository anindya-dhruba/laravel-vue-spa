import $ from 'jquery';
import _ from 'lodash';
import 'bootstrap-sass';
import Vue from 'vue';
import axios from 'axios';

window.$ = window.jQuery = $;
window.axios = axios;

import router from './routes';
import store from './store/index';
import App from './components/App.vue';
import jwtToken from './helpers/jwt-token';

axios.interceptors.request.use(config => {
    config.headers['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
    config.headers['X-Requested-With'] = 'XMLHttpRequest';

    if(jwtToken.getToken()) {
        config.headers['Authorization'] = 'Bearer '+ jwtToken.getToken();
    }

    return config;
}, error => {
    return Promise.reject(error);
});

axios.interceptors.response.use(response => {
    return response;
}, error => {
    let errorResponseData = error.response.data;

    if(errorResponseData.error && (errorResponseData.error === "token_invalid" || errorResponseData.error === "token_expired" || errorResponseData.error === 'token_not_provided')) {
        store.dispatch('logoutRequest')
            .then(()=> {
                router.push({name: 'login'});
            });
    }

    return Promise.reject(error);
});

Vue.component('app', App);

const app = new Vue({
    router,
    store
}).$mount('#app');
