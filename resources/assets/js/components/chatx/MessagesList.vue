<template>
	<div>
		<table class="table">
			<tbody>
			<tr v-for="message in messages" :message="message" :key="message.id">
				<td>
					{{ message.user.name }}
				</td>
				<td>
					{{ message.content }}
				</td>
			</tr>
			</tbody>
		</table>

		<div class="alert alert-info" role="alert" v-show="messages.length === 0">
			Nothing here yet !
		</div>
	</div>
</template>

<script>
	export default {
		props: ['messages']
	}
</script>

