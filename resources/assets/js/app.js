window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

import Vue from 'vue';
import VueResource from 'vue-resource';
import router from './routes';
import store from './store/index';
import App from './components/App.vue';
import jwtToken from './helpers/jwt-token';

Vue.use(VueResource);
Vue.component('app', App);

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);

    if(jwtToken.getToken()) {
        request.headers.set('Authorization', 'Bearer '+ jwtToken.getToken());
    }

    next((response) => {
        if(!response.ok && response.body.error && (response.body.error === "token_invalid" || response.body.error === "token_expired" || response.body.error === 'token_not_provided')) {
            store.dispatch('logoutRequest')
                .then(()=> {
                    router.push({name: 'login'});
                });
        }
    });
});

const app = new Vue({
    router,
    store
}).$mount('#app');
