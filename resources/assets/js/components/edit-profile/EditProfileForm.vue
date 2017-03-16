<template>
    <div>
        <form @submit.prevent="updateProfile()">
            <div class="form-group" :class="{ 'has-error' : errors.name}">
                <label class="control-label" for="name">Name</label>
                <input type="text" class="form-control" id="name" v-model="name">
                <span class="help-block" v-if="errors.name">{{ errors.name }}</span>
            </div>
            <div class="form-group" :class="{ 'has-error' : errors.email}">
                <label class="control-label" for="email">Email</label>
                <input type="email" class="form-control" id="email" v-model="email">
                <span class="help-block" v-if="errors.email">{{ errors.email }}</span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Profile</button>
                <span class="help-block">
                    Update Profile is disabled for demo purpose.
                    <br>
                    Please, enable it from <code>updateProfile()</code> method in EditProfileForm.vue component
                </span>
            </div>
        </form>
    </div>
</template>

<script>
    import {mapState} from 'vuex'
    import * as types from './../../mutation-types';

    export default {
        name: 'edit-profile-form',
        created() {
            this.$store.dispatch('clearEditProfileErrors');
            this.$store.dispatch('setAuthUser');
        },
        computed: {
            ...mapState({
                errors: state => state.editProfile.errors
            }),
            name: {
                get() {
                    return this.$store.state.authUser.name;
                },
                set (value) {
                    this.$store.commit({
                        type: types.UPDATE_AUTH_USER_NAME,
                        value
                    });
                }
            },
            email: {
                get() {
                    return this.$store.state.authUser.email;
                },
                set (value) {
                    this.$store.commit({
                        type: types.UPDATE_AUTH_USER_EMAIL,
                        value
                    });
                }
            }
        },
        methods: {
            updateProfile() {
                // uncomment the following 2 lines to enable edit profile
                alert('Edit Profile is disabled for demo purpose');
                return;

                const formData = {
                    name: this.name,
                    email: this.email
                };

                this.$store.dispatch('updateProfileRequest', formData)
                        .then(() => {
                            this.$router.push({name: 'profile'});
                        })
                        .catch(() => {});
            }
        }
    }
</script>
