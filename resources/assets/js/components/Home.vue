<template>
    <div class="container">
        <div class="jumbotron">
            <h1>Welcome to <span v-once>{{siteName}}</span></h1>
            <p>Starter Boilerplate SPA made with Laravel 5.3, JWT Auth, Vue 2, Vue-router 2, Vuex 2 and love</p>
        </div>
    </div>
</template>

<script>
    import {siteName} from './../config';

    export default{
        data() {
            return {
                siteName: siteName
            }
        },
        components: {}
    }
</script>
