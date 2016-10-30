<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="page-header">
                    <h1>Login</h1>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur corporis deserunt, dolorem eligendi esse eum illo illum inventore libero minus nam numquam officiis praesentium quas quasi repudiandae sed tempore voluptatibus?</p>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form @submit.prevent="login()">
                            <div class="form-group" :class="{ 'has-error' : errors.email}">
                                <label class="control-label" for="email">Email</label>
                                <input type="email" class="form-control" id="email" v-model="email">
                                <span class="help-block" v-if="errors.email">{{ errors.email }}</span>
                            </div>
                            <div class="form-group" :class="{ 'has-error' : errors.password}">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" class="form-control" id="password" v-model="password">
                                <span class="help-block" v-if="errors.password">{{ errors.password }}</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    import * as types from './../mutation-types'

    export default {
        created() {
            this.$store.dispatch('clearLoginErrors');
        },
        data() {
            return {
                email: null,
                password: null
            }
        },
        computed: {
            ...mapState({
                errors: state => state.login.errors
            })
        },
        methods: {
            login() {
                const loginData = {
                    email: this.email,
                    password: this.password
                };

                this.$store.dispatch('loginRequest', loginData)
                    .then((response) => {
                        this.$router.push({name: 'profile'});
                    })
                    .catch((error) => {});
            }
        }
    }
</script>
