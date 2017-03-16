import * as api from './../../config';
import * as types from './../../mutation-types';

export default {
    state: {
        errors: {
            name: null,
            email: null
        }
    },
    mutations: {
        [types.UPDATE_PROFILE_SUCCESS] (state, payload) {
            state.errors.name = null;
            state.errors.email = null;
        },
        [types.UPDATE_PROFILE_FAILURE] (state, payload) {
            state.errors.name = payload.errors.name ? payload.errors.name[0] : null;
            state.errors.email = payload.errors.email ? payload.errors.email[0] : null;
        },
        [types.CLEAR_EDIT_PROFILE_ERRORS] (state, payload) {
            state.errors.name = null;
            state.errors.email = null;
        }
    },
    actions: {
        updateProfileRequest: ({dispatch}, formData) => {
            return new Promise((resolve, reject) => {
                axios.post(api.updateUserProfile, formData)
                    .then(response => {
                        dispatch('updateProfileSuccess', response.data);
                        resolve();
                    })
                    .catch(error => {
                        dispatch('updateProfileFailure', error.response.data);
                        reject();
                    });
            })
        },
        updateProfileSuccess: ({commit, dispatch}, body) => {
            commit({
                type: types.UPDATE_PROFILE_SUCCESS,
                user: body.user
            });

            dispatch('showSuccessNotification', 'Profile has been changed');
        },
        updateProfileFailure: ({commit, dispatch}, body) => {
            commit({
                type: types.UPDATE_PROFILE_FAILURE,
                errors: body
            });

            if(body.error) {
                dispatch('showErrorNotification', body.error);
            }
        },
        clearEditProfileErrors: ({commit}) => {
            commit({
                type: types.CLEAR_EDIT_PROFILE_ERRORS
            });
        }
    }
}