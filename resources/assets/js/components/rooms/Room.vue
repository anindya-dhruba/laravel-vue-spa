<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{room.name}}</h1>
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
                roomId: parseInt(this.$route.params.roomId),
                room: []
            }
        },

        created() {
            this.getRoom(this.roomId);
            this.fetchRoomMessages(this.roomId);

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
                axios.get(api.room + "/" + roomId).then(response => {
                    this.room = response.data;
                });
            },

            fetchMessages() {
                axios.get(api.message).then(response => {
                    this.messages = response.data;
                });
            },

            fetchRoomMessages(roomId) {
                axios.get(api.room_message + "/" + roomId).then(response => {
                    console.log(response);
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
