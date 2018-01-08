<template>
	<div>
		<form @submit.prevent="updatePassword">
			<div class="form-group">
				<label for="new-password">New Password</label>
				<input
					type="password"
					class="form-control"
					:class="{'is-invalid' : error.new_password}"
					id="new-password"
					v-model="form.new_password"
					:disabled="loading"
				/>
				<div class="invalid-feedback" v-show="error.new_password">{{ error.new_password }}</div>
			</div>
			<div class="form-group">
				<label for="confirm-new-password">Confirm New Password</label>
				<input
					type="password"
					class="form-control"
					:class="{'is-invalid' : error.confirm_new_password}"
					id="confirm-new-password"
					v-model="form.confirm_new_password"
					:disabled="loading"
				/>
				<div class="invalid-feedback" v-show="error.confirm_new_password">{{ error.confirm_new_password }}</div>
			</div>

			<button type="submit" class="btn btn-primary" :disabled="loading">
				<span v-show="loading">Updating Password</span>
				<span v-show="!loading">Update Password</span>
			</button>
			<div class="form-text text-muted mt-4">
				Update Password is disabled for demo purpose.
				<br>
				Please, enable it from <code>updatePassword()</code> method in EditPasswordForm.vue component
			</div>
		</form>
	</div>
</template>

<script>
	import {mapState} from 'vuex'
	import {api} from "../../../config";

	export default {
		data() {
			return {
				loading: false,
				form: {
					new_password: '',
					confirm_new_password: ''
				},
				error: {
					new_password: '',
					confirm_new_password: ''
				}
			}
		},
		methods: {
			updatePassword() {
				// uncomment the following 2 lines in your app
				this.$noty.info('Edit Password is disabled for demo purpose');
				return;

				this.loading = true;
				axios.post(api.updateUserPassword, this.form)
					.then((res) => {
						this.loading = false;
						this.$noty.success('Password updated');
						this.$emit('updateSuccess');
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
				this.error.new_password = errors.new_password ? errors.new_password[0] : null;
				this.error.confirm_new_password = errors.confirm_new_password ? errors.confirm_new_password[0] : null;
			},
			clearErrors() {
				this.error.new_password = null;
				this.error.confirm_new_password = null;
			}
		}
	}
</script>
