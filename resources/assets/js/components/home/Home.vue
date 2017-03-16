<template>
    <div class="container">
        <div class="jumbotron">
            <h1 v-once>{{siteName}}</h1>
            <p>Starter Boilerplate SPA made with Laravel 5.4, JWT Auth, Vue 2, Vue-router 2, Vuex 2, Axios and love</p>
        </div>
    </div>
</template>

<script>
    import {siteName} from './../../config';

    export default {
        name: 'home',
        data() {
            return {
                siteName: siteName
            }
        },
        components: {}
    }
</script>
