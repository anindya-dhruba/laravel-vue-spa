<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Room n°1</h1>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <chat-messages :messages="messages"></chat-messages>
                    </div>
                    <chat-form v-on:messagesent="addMessage" ></chat-form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    import {api} from "../../config";
    
    export default {

        data() {
            return {
                messages: []
            }
        },

        created() {
            this.fetchMessages();

            window.Echo.private('room')
              .listen('MessageSent', (e) => {
                this.messages.push({
                  message: e.message.message,
                  user: e.user
                });
            });
        },


        methods: {
            fetchMessages() {
                console.log("hello")
                axios.get(api.message).then(response => {
                    this.messages = response.data;
                });
            },

            addMessage(message) {
                console.log(message);
                this.messages.push(message);

                axios.post(api.message, message).then(response => {
                  console.log(response.data);
                });
            }
        }
    };

</script>
