<template>
	<footer>
		<hr>
		<div class="container">
			&copy;<span v-once>{{ siteName }}</span> <span v-once>{{ currentYear }},
			developed by <a href="http://github.com/anindya-dhruba" target="_blank">Anindya Dhruba</a></span>
		</div>
	</footer>
</template>

<script>
	import {siteName} from '../../config';

	export default {
		data() {
			return {
				siteName: siteName,
				currentYear: (new Date).getFullYear()
			}
		}
	}
</script>
