<template>
	<div>
		<form @submit.prevent="login">
			<div class="form-group" :class="{'has-error' : error.email}">
				<label class="control-label" for="email">Email</label>
				<input
					type="email"
					class="form-control"
					id="email"
					v-model="form.email"
					:disabled="loading"
				/>
				<span class="help-block" v-show="error.email">{{ error.email }}</span>
			</div>
			<div class="form-group" :class="{'has-error' : error.password}">
				<label class="control-label" for="password">Password</label>
				<input
					type="password"
					class="form-control"
					id="password"
					v-model="form.password"
					:disabled="loading"
				/>
				<span class="help-block" v-show="error.password">{{ error.password }}</span>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block" :disabled="loading">
					<span v-show="loading">Logging in</span>
					<span v-show="!loading">Login</span>
				</button>
			</div>
		</form>
	</div>
</template>

<script>
	import {api} from "../../config";

	export default {
		data() {
			return {
				loading: false,
				form: {
					email: null,
					password: null
				},
				error: {
					email: null,
					password: null
				}
			}
		},
		methods: {
			login() {
				this.loading = true;
				axios.post(api.login, this.form)
					.then(res => {
						this.loading = false;
						this.$noty.success('Welcome back!');
						this.$emit('loginSuccess', res.data);
					})
					.catch(err => {
						(err.response.data.error) && this.$noty.error(err.response.data.error);

						(err.response.data.errors)
							? this.setErrors(err.response.data.errors)
							: this.clearErrors();

						this.loading = false;
					});
			},
			setErrors(errors) {
				this.error.email = errors.email ? errors.email[0] : null;
				this.error.password = errors.password ? errors.password[0] : null;
			},
			clearErrors() {
				this.error.email = null;
				this.error.password = null;
			}
		}
	}
</script>
