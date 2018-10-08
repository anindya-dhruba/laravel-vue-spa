<template>
    <ul class="chat">
        <li v-for="message in messages">
            <div class="chat-body">
                <div>
                    <strong>
                        {{ message.user.name }}
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['messages']
    };
</script>