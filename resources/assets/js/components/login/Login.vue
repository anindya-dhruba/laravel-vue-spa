<template>
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 col-lg-8">
				<div class="page-header">
					<h1 class="display-4">Login</h1>
				</div>
				<div class="py-4">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur corporis deserunt, dolorem eligendi esse eum illo illum inventore libero minus nam numquam officiis praesentium quas quasi repudiandae sed tempore voluptatibus?</p>
				</div>
			</div>
			<div class="col-12 col-md-6 col-lg-4">
				<div class="card">
					<div class="card-body">
						<login-form @loginSuccess="loginSuccess"></login-form>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import LoginForm from './../login/LoginForm.vue'
	import jwtToken from "../../helpers/jwt-token";
	import {mapActions} from "vuex";

	export default {
		components: {
			'login-form': LoginForm
		},
		methods: {
			...mapActions([
				'setAuthUser'
			]),
			loginSuccess(data) {
				jwtToken.setToken(data.token);
				this.setAuthUser(data.user);
				this.$router.push({name: 'profile'});
			}
		}
	}
</script>
