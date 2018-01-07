<template>
	<div class="container">
		<div class="jumbotron">
			<h1 v-once>{{siteName}}</h1>
			<p>Starter Boilerplate SPA made with Laravel 5.5, JWT Auth, Vue 2, Vue-router 3, Vuex 3, Axios and love</p>
		</div>
	</div>
</template>

<script>
	import {siteName} from './../../config';

	export default {
		data() {
			return {
				siteName: siteName
			}
		}
	}
</script>
