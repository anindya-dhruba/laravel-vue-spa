<template>
    <div class="panel-form">
        <input id="btn-input" type="text" name="message" placeholder="Type your message" v-model="newMessage" @keyup.enter="sendMessage">
        <span>
            <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                Send
            </button>
        </span>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    export default {

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
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage
                });

                this.newMessage = ''
            }
        }    
    }
</script>