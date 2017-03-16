import * as api from './../../config';
import jwtToken from './../../helpers/jwt-token';
import * as types from './../../mutation-types';

export default {
    state: {
        errors: {
            email: null,
            password: null
        }
    },
    mutations: {
        [types.LOGIN_SUCCESS] (state, payload) {
            state.errors.email = null;
            state.errors.passwor = null;
        },
        [types.LOGIN_FAILURE] (state, payload) {
            state.errors.email = payload.errors.email ? payload.errors.email[0] : null;
            state.errors.password = payload.errors.password ? payload.errors.password[0] : null;
        },
        [types.CLEAR_LOGIN_ERRORS] (state, payload) {
            state.errors.email = null;
            state.errors.password = null;
        }
    },
    actions: {
        loginRequest: ({dispatch}, formData) => {
            return new Promise((resolve, reject) => {
                axios.post(api.login, formData)
                    .then(response => {
                        dispatch('loginSuccess', response.data);
                        resolve();
                    })
                    .catch(error => {
                        dispatch('loginFailure', error.response.data);
                        reject();
                    });
            });
        },
        loginSuccess: ({commit, dispatch}, jwtTokenObj) => {
            jwtToken.setToken(jwtTokenObj.token);

            commit({
                type: types.LOGIN_SUCCESS
            });

            dispatch('setAuthUser');
        },
        loginFailure: ({commit, dispatch}, body) => {
            commit({
                type: types.LOGIN_FAILURE,
                errors: body
            });

            if(body.error) {
                dispatch('showErrorNotification', body.error);
            }
        },
        clearLoginErrors: ({commit}) => {
            commit({
                type: types.CLEAR_LOGIN_ERRORS
            });
        },
        logoutRequest: ({dispatch}) => {
            jwtToken.removeToken();

            return new Promise((resolve, reject) => {
                dispatch('unsetAuthUser');
                resolve();
            });
        }
    }
}