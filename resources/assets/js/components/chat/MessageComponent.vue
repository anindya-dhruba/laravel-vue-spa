<template>
    <div class="chat_message">
        <span class="user_item">{{ message.user.name }}</span>
        <p class="message-item">{{ message.message }}</p>
    </div>
</template>

<script>
    export default {
        props: ['message']
    }
</script>