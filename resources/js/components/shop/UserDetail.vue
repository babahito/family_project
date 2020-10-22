<template>
<div>
	<div>
	<h1>ユーザ詳細</h1>
	<ul>
		<li>ユーザー番号: {{ user.id }}</li>
		<li>名前: {{ user.name }}</li>
		<li>メール: {{ user.email }}</li>
	</ul>
	</div>
</div>
</template>

<script>
	export default {
		data(){
			return {
				id: this.$route.params.id,
				user: ''
			}
		},
		created(){
			axios.get('/api/user/' + this.id)
			.then(response => this.user = response.data.user)
			.catch(erorr => console.log(error));
		}

	}
</script>