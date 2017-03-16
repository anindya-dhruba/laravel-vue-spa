<template>
    <div>
        <h1 class="page-header">Edit Profile</h1>
        <div class="panel panel-default">
            <div class="panel-body">
                <edit-profile-form></edit-profile-form>
            </div>
        </div>
    </div>
</template>

<script>
    import EditProfileForm from './../edit-profile/EditProfileForm.vue'


    export default {
        name: 'edit-profile',
        components: {
            EditProfileForm
        }
    }
</script>
