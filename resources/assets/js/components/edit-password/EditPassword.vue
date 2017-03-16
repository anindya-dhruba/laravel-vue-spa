<template>
    <div>
        <h1 class="page-header">Edit Password</h1>
        <div class="panel panel-default">
            <div class="panel-body">
                <edit-password-form></edit-password-form>
            </div>
        </div>
    </div>
</template>

<script>
    import EditPasswordForm from './../edit-password/EditPasswordForm.vue'

    export default {
        name: 'edit-password',
        components: {
            EditPasswordForm
        }
    }
</script>
