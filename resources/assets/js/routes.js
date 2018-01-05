import Vue from 'vue';
import VueRouter from 'vue-router';
import jwtToken from './helpers/jwt-token';

Vue.use(VueRouter);

import Store from './store/index'
import Home from './components/home/Home.vue'
import Login from './components/login/Login.vue'
import ProfileWrapper from './components/profile/ProfileWrapper.vue'
import Profile from './components/profile/Profile.vue'
import EditProfile from './components/profile/edit-profile/EditProfile.vue'
import EditPassword from './components/profile/edit-password/EditPassword.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'index',
            component: Home,
            meta: {}
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: { requiresGuest: true }
        },
        {
            path: '/profile',
            component: ProfileWrapper,
            children: [
                {
                    path: '',
                    name: 'profile',
                    component: Profile,
                    meta: { requiresAuth: true }
                },
                {
                    path: 'edit-profile',
                    name: 'profile.editProfile',
                    component: EditProfile,
                    meta: { requiresAuth: true }
                },
                {
                    path: 'edit-password',
                    name: 'profile.editPassword',
                    component: EditPassword,
                    meta: { requiresAuth: true }
                }
            ]
        },
    ]
});

router.beforeEach((to, from, next) => {
    Store.dispatch('hideErrorNotification');

    if(to.meta.requiresAuth) {
        if(Store.state.authUser.authenticated || jwtToken.getToken())
            return next();
        else
            return next({name: 'login'});
    }
    if(to.meta.requiresGuest) {
        if(Store.state.authUser.authenticated || jwtToken.getToken())
            return next({name: 'index'});
        else
            return next();
    }
    next();
});

export default router;
