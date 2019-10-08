<template>
	<div class="input-group">
		<input
			v-model="newMessage"
			v-on:keydown.enter.prevent="sendMessage"
		    type="text"
			class="form-control"
			placeholder="Type your message"
	  	/>
		<div class="input-group-append">
			<button type="submit" class="btn btn-secondary" v-on:click.prevent="sendMessage">Send</button>
		</div>
	</div>
</template>

<script>
	import {mapState} from "vuex"

	export default {
		props: ['messages'],
		data() {
			return {
				newMessage: ''
			}
		},
		computed: mapState({
			user: state => state.auth
		}),
		methods: {
			sendMessage() {
				// Add to existing messages
				this.messages.push({
					"content": this.newMessage,
					"user": {
						"name": this.user.name
					}
				});

				// Send to api
				const messageData = {
					"content": this.newMessage,
					"user_id": this.user.user_id,
					"room_id": 1
				};
				axios.post('/api/messages', messageData).then(response => {
					this.newMessage = '';
				})
			}
		}
	}
</script>

