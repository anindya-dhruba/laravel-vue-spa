<template>
	<div>
		<top-menu></top-menu>
		<transition name="fade" mode="out-in">
			<router-view></router-view>
		</transition>
		<app-footer></app-footer>
	</div>
</template>

<script>
	import TopMenu from './shared/TopMenu.vue';
	import AppFooter from './shared/AppFooter.vue';

	export default {
		components: {
			'top-menu': TopMenu,
			'app-footer': AppFooter
		}
	}
</script>
