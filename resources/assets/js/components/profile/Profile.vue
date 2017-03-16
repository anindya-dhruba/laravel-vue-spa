<template>
    <div>
        <h1 class="page-header">{{user.name}}'s Profile</h1>
        <div class="panel panel-default">
            <ul class="list-group">
                <li class="list-group-item">
                    Name
                    <br>
                    <h4>{{ user.name }}</h4>
                </li>
                <li class="list-group-item">
                    Email
                    <br>
                    <h4>{{ user.email }}</h4>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'

    export default {
        name: 'profile',
        created() {
            this.$store.dispatch('setAuthUser');
        },
        computed: {
            ...mapState({
                user: state => state.authUser
            })
        }
    }
</script>
