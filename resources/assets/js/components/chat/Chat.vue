<template>
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 col-lg-8">
                <div class="row chat-interface">
                    <div class="messages-content"
						ref="mainContainer" >
						<message-component  
							v-for="message in messages" 
							:key="message.id" 
							:message="message" />
					</div>
                    <user-form
						v-on:sendMessage="sendMessage"
					 />
                </div>
			</div>

		</div>
	</div>
</template>

<script>
	import MessageComponent from './../chat/MessageComponent.vue';
	import UserForm from './../chat/UserForm.vue';
	import {mapActions} from "vuex";
	import Echo from "laravel-echo";

	export default {
		components: {
			'user-form': UserForm,
			'message-component': MessageComponent
		},
		data() {
            return {
                messages: []
            }
		},
        mounted() {
			// We grab the 10 last messages from database
			axios.get('/api/chat/messages').then((response) => {
				this.messages = response.data.reverse();
			});

			// We listen to our chat channel
			window.Echo.private('chat')
				.listen('MessageSent', (e) => {
					//console.log("on reçoit une notif");
					let formatedMessage = e.message;
					formatedMessage.user = e.user;
					this.messages.push(
						formatedMessage
					);
				});

		},
		updated(){ 
			// We scroll the element to display the latest messages
			this.$refs.mainContainer.scrollTop = this.$refs.mainContainer.scrollHeight;
		},
		beforeDestroy(){
			// We stop listening to the chat event
			window.Echo.leave('chat');
		},
		methods: {
			sendMessage(newMessage) {
				axios.post('/api/chat/message', {
					message: newMessage
				}).catch(() => {
					alert("Désolé impossible d'envoyer votre message");
				});
			}

		}
	}
</script>