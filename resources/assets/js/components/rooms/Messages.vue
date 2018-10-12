<template>
    <ul class="chat">
        <li v-for="message in messages">
            <div class="chat-body">
                <p class="user">{{ message.user.name }}</p>
                <p class="message">{{ message.message }}</p>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['messages']
    };
</script>