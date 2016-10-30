<template>
    <footer>
        <hr>
        <div class="container">
            &copy; all rights reserved by <span v-once>{{ siteName }}</span> <span v-once>{{ currentYear }}</span>
        </div>
    </footer>
</template>

<script>
    import {siteName} from './../config';

    export default {
        data() {
            return {
                siteName: siteName,
                currentYear: (new Date).getFullYear()
            }
        },
        components: {}
    }
</script>
