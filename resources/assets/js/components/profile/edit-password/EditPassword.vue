<template>
	<div>
		<h1 class="page-header">Edit Password</h1>
		<div class="panel panel-default">
			<div class="panel-body">
				<edit-password-form @updateSuccess="updateSuccess"></edit-password-form>
			</div>
		</div>
	</div>
</template>

<script>
	import EditPasswordForm from './EditPasswordForm.vue'

	export default {
		components: {
			'edit-password-form': EditPasswordForm
		},
		methods: {
			updateSuccess() {
				this.$router.push({name: 'profile'});
			}
		}
	}
</script>
