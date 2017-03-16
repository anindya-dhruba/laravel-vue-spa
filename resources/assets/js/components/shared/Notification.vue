<template>
    <div class="notification">
        <transition name="fade" mode="in-out">
            <div class="alert alert-success" v-if="success" @click="hideSuccessNotification()">
                <div class="container">{{ success }}</div>
            </div>
            <div class="alert alert-danger" v-if="error" @click="hideErrorNotification()">
                <div class="container">{{ error }}</div>
            </div>
            <div class="alert alert-info" v-if="info" @click="hideInfoNotification()">
                <div class="container">{{ info }}</div>
            </div>
        </transition>
    </div>
</template>

<script>
    import {mapState, mapActions} from 'vuex';

    export default {
        name: 'notification',
        computed: {
            ...mapState({
                success: state => state.notification.success,
                error: state => state.notification.error,
                info: state => state.notification.info
            })
        },
        methods: {
            ...mapActions([
                'hideSuccessNotification',
                'hideErrorNotification',
                'hideInfoNotification'
            ])
        }
    }
</script>
