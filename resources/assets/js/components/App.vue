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
    import TopMenu from './Top-menu.vue'
    import Notification from './Notification.vue'
    import Footer from './Footer.vue'
    import jwtToken from './../helpers/jwt-token';
    import * as api from './../config'
    import * as types from './../mutation-types';

    export default {
        created() {
            if(jwtToken.getToken()) {
                this.$store.dispatch('setAuthUser');
            }
        },
        components: {
            'top-menu': TopMenu,
            'notification': Notification,
            'app-footer': Footer
        }
    }
</script>
