<template>
    <div>
        <top-menu></top-menu>
        <notification></notification>
        <transition name="fade" mode="out-in">
            <router-view></router-view>
        </transition>
        <app-footer></app-footer>
    </div>
</template>

<script>
    import TopMenu from './shared/TopMenu.vue'
    import Notification from './shared/Notification.vue'
    import AppFooter from './shared/AppFooter.vue'
    import jwtToken from './../helpers/jwt-token';

    export default {
        created() {
            if(jwtToken.getToken()) {
                this.$store.dispatch('setAuthUser');
            }
        },
        components: {
            'top-menu': TopMenu,
            'notification': Notification,
            'app-footer': AppFooter
        }
    }
</script>
