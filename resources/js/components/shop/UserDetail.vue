<template>
<v-app>
	<h1>ユーザ詳細</h1>

		<v-simple-table>
			<template v-slot:default>
			<thead>
				<tr>
					<th class="text-left">ID</th>
					<th class="text-left">名前</th>
					<th class="text-left">email</th>
					<th class="text-left">誕生日</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{ user.id }}</td>
					<td>{{ user.name }}</td>
					<td>{{ user.email }}</td>	  
					<td>{{ user.email }}</td>	  
				</tr>
			</tbody>
			</template>
		</v-simple-table>
</v-app>
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