<template>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<router-link class="navbar-brand" :to="{name: 'index'}" v-once>{{ siteName }}</router-link>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<router-link :to="{name: 'index'}" tag="li" activeClass="active" exact>
						<a>Home</a>
					</router-link>
					<router-link v-show="!isLoggedIn" :to="{name: 'login'}" tag="li" activeClass="active" exact>
						<a>Login</a>
					</router-link>
					<router-link v-show="isLoggedIn" :to="{name: 'profile'}" tag="li" activeClass="active">
						<a>Profile</a>
					</router-link>
					<li v-show="isLoggedIn">
						<a href="#" @click.prevent="logout">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</template>

<script>
	import {siteName} from './../../config';
	import {mapGetters} from 'vuex';
	import jwtToken from '../../helpers/jwt-token';

	export default {
		data() {
			return {
				siteName: siteName
			}
		},
		computed: mapGetters([
			'isLoggedIn'
		]),
		methods: {
			logout() {
				jwtToken.removeToken();
				this.$store.dispatch('unsetAuthUser')
					.then(() => {
						this.$noty.success('You are logged out');
						this.$router.push({name: 'login'});
					});
			}
		}
	}
</script>
