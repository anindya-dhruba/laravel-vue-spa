import * as api from './../../config';
import * as types from './../../mutation-types';

export default {
    state: {
        errors: {
            newPassword: null,
            confirmNewPassword: null,
        }
    },
    mutations: {
        [types.UPDATE_PASSWORD_SUCCESS] (state, payload) {
            state.errors.newPassword = null;
            state.errors.confirmNewPassword = null;
        },
        [types.UPDATE_PASSWORD_FAILURE] (state, payload) {
            state.errors.newPassword = payload.errors.new_password ? payload.errors.new_password[0] : null;
            state.errors.confirmNewPassword = payload.errors.confirm_new_password ? payload.errors.confirm_new_password[0] : null;
        },
        [types.CLEAR_EDIT_PASSWORD_ERRORS] (state, payload) {
            state.errors.newPassword = null;
            state.errors.confirmNewPassword = null;
        }
    },
    actions: {
        updatePasswordRequest: ({dispatch}, formData) => {
            return new Promise((resolve, reject) => {
                axios.post(api.updateUserPassword, formData)
                    .then(response => {
                        dispatch('updatePasswordSuccess', response.data);
                        resolve();
                    })
                    .catch(error => {
                        dispatch('updatePasswordFailure', error.response.data);
                        reject();
                    });
            })
        },
        updatePasswordSuccess: ({commit, dispatch}, body) => {
            commit({
                type: types.UPDATE_PASSWORD_SUCCESS,
                user: body.user
            });

            dispatch('showSuccessNotification', 'Password has been changed');
        },
        updatePasswordFailure: ({commit, dispatch}, body) => {
            commit({
                type: types.UPDATE_PASSWORD_FAILURE,
                errors: body
            });

            if(body.error) {
                dispatch('showErrorNotification', body.error);
            }
        },
        clearEditPasswordErrors: ({commit}) => {
            commit({
                type: types.CLEAR_EDIT_PASSWORD_ERRORS
            });
        },
    }
}