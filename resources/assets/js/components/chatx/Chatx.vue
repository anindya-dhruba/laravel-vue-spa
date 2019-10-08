<template>
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-12 col-lg-12">
				<div class="page-header">
					<h1 class="display-4">ChatX</h1>
				</div>
				<form class="card p-2">
					<messages-list :messages="messages"></messages-list>
					<message-input :messages="messages"></message-input>
				</form>
			</div>
		</div>
	</div>
</template>

<script>
	import {mapState} from "vuex"
	import MessagesList from './MessagesList.vue'
	import MessageInput from './MessageInput.vue'

	export default {
		data() {
			return {
				messages: [],
			}
		},
		components: {
			'messages-list': MessagesList,
			'message-input': MessageInput
		},
		computed: mapState({
			user: state => state.auth
		}),
		created() {
			axios.get('/api/messages').then(response => {
				this.messages = response.data.reverse();
			});
		}
	}
</script>

