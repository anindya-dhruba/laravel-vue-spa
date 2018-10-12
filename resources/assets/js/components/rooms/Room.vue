<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Insert Room Name</h1>
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
                messages: [],
                roomId: {room: parseInt(this.$route.params.roomId)},
                room: []
            }
        },

        created() {
            this.fetchMessages();
            this.getRoom(this.roomId);

            window.Echo.private('messages')
              .listen('MessageSent', (e) => {
                this.messages.push({
                  message: e.message.message,
                  user: e.user
                });
            });
        },

        updated(){            
            var elem = this.$el.querySelector('.panel-body')
            elem.scrollTop = elem.scrollHeight;
        },


        methods: {
            getRoom(roomId) {
                axios.get(api.room_message, roomId).then(response => {
                    console.log(response);
                    // this.room = response.data;
                });
                console.log(this.room);
            },

            fetchMessages() {
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
