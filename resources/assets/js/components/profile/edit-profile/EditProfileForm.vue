<template>
	<div>
		<form @submit.prevent="updateProfile">
			<div class="form-group">
				<label for="name">Name</label>
				<input
					type="text"
					class="form-control"
					:class="{'is-invalid' : error.name}"
					id="name"
					v-model="form.name"
					:disabled="loading"
				/>
				<div class="invalid-feedback" v-show="error.name">{{ error.name }}</div>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input
					type="email"
					class="form-control"
					:class="{'is-invalid' : error.email}"
					id="email"
					v-model="form.email"
					:disabled="loading"
				/>
				<div class="invalid-feedback" v-show="error.email">{{ error.email }}</div>
			</div>
			<button type="submit" class="btn btn-primary" :disabled="loading">
				<span v-show="loading">Updating Profile</span>
				<span v-show="!loading">Update Profile</span>
			</button>
			<div class="form-text text-muted mt-4">
				Update Profile is disabled for demo purpose.
				<br>
				Please, enable it from <code>updateProfile()</code> method in EditProfileForm.vue component
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
				error: {
					name: '',
					email: ''
				}
			};
		},
		computed: mapState({
			form: state => {
				return {...state.auth};
			}
		}),
		methods: {
			updateProfile() {
				// uncomment the following 2 lines to enable edit profile
				this.$noty.info('Edit Profile is disabled for demo purpose');
				return;

				this.loading = true;
				axios.post(api.updateUserProfile, this.form)
					.then((res) => {
						this.loading = false;
						this.$noty.success('Profile Updated');
						this.$emit('updateSuccess', res.data);
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
				this.error.name = errors.name ? errors.name[0] : null;
				this.error.email = errors.email ? errors.email[0] : null;
			},
			clearErrors() {
				this.error.name = null;
				this.error.email = null;
			}
		}
	}
</script>
