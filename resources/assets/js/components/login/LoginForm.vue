<template>
    <div>
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
</template>

<script>
    import {mapState} from 'vuex';

    export default {
        name: 'login-form',
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
