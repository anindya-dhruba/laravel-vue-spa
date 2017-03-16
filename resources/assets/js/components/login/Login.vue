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
                        <login-form></login-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import LoginForm from './../login/LoginForm.vue'

    export default {
        name: 'login',
        components: {
            LoginForm
        }
    }
</script>
