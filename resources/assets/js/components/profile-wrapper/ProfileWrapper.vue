<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <router-link :to="{name: 'profile'}" class="list-group-item" activeClass="active" exact>View Profile</router-link>
                    <router-link :to="{name: 'profile.editProfile'}" class="list-group-item" activeClass="active" exact>Edit Profile</router-link>
                    <router-link :to="{name: 'profile.editPassword'}" class="list-group-item" activeClass="active" exact>Edit Password</router-link>
                </div>
            </div>
            <div class="col-md-9">
                <transition name="fade" mode="out-in">
                    <router-view></router-view>
                </transition>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'profile-wrapper'
    }
</script>
