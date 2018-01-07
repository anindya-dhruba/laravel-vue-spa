<template>
	<div>
		<h1 class="page-header">Edit Profile</h1>
		<div class="panel panel-default">
			<div class="panel-body">
				<edit-profile-form @updateSuccess="updateSuccess"></edit-profile-form>
			</div>
		</div>
	</div>
</template>

<script>
	import EditProfileForm from './EditProfileForm.vue'
	import {mapActions} from 'vuex';

	export default {
		components: {
			'edit-profile-form': EditProfileForm
		},
		methods: {
			...mapActions([
				'setAuthUser'
			]),
			updateSuccess(data) {
				this.setAuthUser(data.user);
				this.$router.push({name: 'profile'});
			}
		}
	}
</script>
