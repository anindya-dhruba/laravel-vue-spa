<template>
	<div>
		<form @submit.prevent="updateProfile">
			<div class="form-group" :class="{'has-error' : error.name}">
				<label class="control-label" for="name">Name</label>
				<input
					type="text"
					class="form-control"
					id="name"
					v-model="form.name"
					:disabled="loading"
				/>
				<span class="help-block" v-show="error.name">{{ error.name }}</span>
			</div>
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
			<div class="form-group">
				<button type="submit" class="btn btn-primary" :disabled="loading">
					<span v-show="loading">Updating Profile</span>
					<span v-show="!loading">Update Profile</span>
				</button>
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
				// alert('Edit Profile is disabled for demo purpose');
				// return;

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
