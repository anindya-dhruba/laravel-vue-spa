<template>
    <div class="message-form">
            <textarea 
                cols="25"
                rows="5"
                class="form-input"
                @keydown="onMessageTyping"
                v-model="message"
            >
            </textarea>
            <button @click="sendMessage">Envoyer</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: null
            }
        },
        methods: {
            onMessageTyping(e) {
                if(e.keyCode === 13 && !e.shiftKey) {
                    e.preventDefault();
                    this.sendMessage(); 
                }        
            },
            sendMessage() {
                // If message empty we don't send anything
                if(!this.message || this.message.trim() === '') {
                    return
                }
                // Send it to parent component
                this.$emit('sendMessage', this.message);
                this.message = null;
            }
        }
    }
</script>