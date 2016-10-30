import Vue from 'vue';
import * as api from './../../config';
import * as types from './../../mutation-types';

export default {
    state: {
        authenticated: false,
        name: null,
        email: null
    },
    mutations: {
        [types.UPDATE_AUTH_USER_NAME] (state, payload) {
            state.name = payload.value;
        },
        [types.UPDATE_AUTH_USER_EMAIL] (state, payload) {
            state.email = payload.value;
        },
        [types.SET_AUTH_USER] (state, payload) {
            state.authenticated = true;
            state.name = payload.user.name;
            state.email = payload.user.email;
        },
        [types.UNSET_AUTH_USER] (state, payload) {
            state.authenticated = false;
            state.name = null;
            state.email = null;
        }
    },
    actions: {
        setAuthUser: ({commit, dispatch}) => {
            Vue.http.get(api.currentUser)
                .then(response => {
                    commit({
                        type: types.SET_AUTH_USER,
                        user: response.body
                    })
                })
                .catch(error => {
                    dispatch('logoutRequest');
                })
        },
        unsetAuthUser: ({commit}) => {
            commit({
                type: types.UNSET_AUTH_USER
            });
        }
    }
}