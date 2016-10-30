import Vue from 'vue';
import Vuex from 'vuex';

import notification from "./modules/notification";
import authUser from "./modules/auth-user";
import login from "./modules/login";
import editProfile from "./modules/edit-profile";
import editPassword from "./modules/edit-password";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        notification,
        authUser,
        login,
        editProfile,
        editPassword,
    },
    strict: true
});