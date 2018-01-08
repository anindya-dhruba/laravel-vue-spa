<template>
	<div class="container">
		<div class="jumbotron">
			<h1 class="display-4" v-once>{{siteName}}</h1>
			<p class="lead">Starter Boilerplate SPA made with Laravel 5.5, Bootstrap 4, JWT Auth, Vue 2, Vue-router 3, Vuex 3, Axios and love</p>
			<div class="pt-3">
				<iframe src="https://ghbtns.com/github-btn.html?user=anindya-dhruba&repo=laravel-vue-spa&type=star&count=true&size=large" frameborder="0" scrolling="0" width="130px" height="30px"></iframe>
				<iframe src="https://ghbtns.com/github-btn.html?user=anindya-dhruba&repo=laravel-vue-spa&type=fork&count=true&size=large" frameborder="0" scrolling="0" width="130px" height="30px"></iframe>
				<iframe src="https://ghbtns.com/github-btn.html?user=anindya-dhruba&repo=laravel-vue-spa&type=watch&count=true&size=large&v=2" frameborder="0" scrolling="0" width="130px" height="30px"></iframe>
			</div>
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
