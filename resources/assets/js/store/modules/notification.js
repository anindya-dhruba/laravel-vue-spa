import * as types from './../../mutation-types';

export default {
    state: {
        success: null,
        error: null,
        info: null
    },
    mutations: {
        [types.SHOW_SUCCESS_NOTIFICATION] (state, payload) {
            state.success = payload.msg;
        },
        [types.HIDE_SUCCESS_NOTIFICATION] (state, payload) {
            state.success = null;
        },
        [types.SHOW_ERROR_NOTIFICATION] (state, payload) {
            state.error = payload.msg;
        },
        [types.HIDE_ERROR_NOTIFICATION] (state, payload) {
            state.error = null;
        },
        [types.SHOW_INFO_NOTIFICATION] (state, payload) {
            state.info = payload.msg;
        },
        [types.HIDE_INFO_NOTIFICATION] (state, payload) {
            state.info = null;
        },
        [types.HIDE_ALL_NOTIFICATION] (state, payload) {
            state.success = null;
            state.error = null;
            state.info = null;
        }
    },
    actions: {
        showSuccessNotification({commit}, msg) {
            commit({
                type: types.SHOW_SUCCESS_NOTIFICATION,
                msg: msg
            });
        },
        hideSuccessNotification({commit}) {
            commit({
                type: types.HIDE_SUCCESS_NOTIFICATION
            });
        },
        showErrorNotification({commit}, msg) {
            commit({
                type: types.SHOW_ERROR_NOTIFICATION,
                msg: msg
            });
        },
        hideErrorNotification({commit, state}) {
            if(state.error) {
                commit({
                    type: types.HIDE_ERROR_NOTIFICATION
                });
            }
        },
        showInfoNotification({commit}, msg) {
            commit({
                type: types.SHOW_INFO_NOTIFICATION,
                msg: msg
            });
        },
        hideInfoNotification({commit}) {
            commit({
                type: types.HIDE_INFO_NOTIFICATION
            });
        },
        hideAllNotifications({commit}) {
            commit({
                type: types.HIDE_ALL_NOTIFICATION
            });
        }
    }
}