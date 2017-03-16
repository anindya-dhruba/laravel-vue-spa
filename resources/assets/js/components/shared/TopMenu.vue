<template>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"/>
                    <span class="icon-bar"/>
                    <span class="icon-bar"/>
                </button>
                <router-link class="navbar-brand" :to="{name: 'index'}" v-once>{{ siteName }}</router-link>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <router-link :to="{name: 'index'}" tag="li" activeClass="active" exact>
                        <a>Home</a>
                    </router-link>
                    <router-link v-if="!user.authenticated" :to="{name: 'login'}" tag="li" activeClass="active" exact>
                        <a>Login</a>
                    </router-link>
                    <router-link v-if="user.authenticated" :to="{name: 'profile'}" tag="li" activeClass="active">
                        <a>Profile</a>
                    </router-link>
                    <li v-if="user.authenticated">
                        <a href="#" @click.prevent="logout()">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    import {siteName} from './../../config';
    import {mapState} from 'vuex';

    export default {
        name: 'top-menu',
        data() {
            return {
                siteName: siteName
            }
        },
        computed: {
            ...mapState({
                user: state => state.authUser
            })
        },
        methods: {
            logout() {
                this.$store.dispatch('logoutRequest')
                    .then(() => {
                        this.$router.push({name: 'login'});
                    });
            }
        }
    }
</script>
