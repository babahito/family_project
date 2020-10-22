
<template>
	<div>
		<h1>ユーザー一覧</h1>

			<router-link :to="`/shop/user/create`"><button>新規作成</button></router-link>
	
		
		<table class="table table-bordered">
			<thead  class="thead-dark">
				<tr>
					<th>ID</th>
					<th>氏名</th>
					<th>メール</th>
					<th>詳細</th>
					<th>更新</th>
					<th>削除</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(user,index) in users" v-bind:key="index">
					<td>{{user.id}}</td>
					<td>{{user.name}}</td>
					<td>{{user.email}}</td>
					<td><router-link :to="`/shop/user/${user.id}`"><button>click</button></router-link></td>
					<td><router-link :to="`/shop/user/${user.id}/edit/`"><button>click</button></router-link></td>
					<td><button class="btn btn-danger" v-on:click="userDelete(index, user.id)">削除</button></td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
export default {
	data(){
		return {
			users:[],
		}
	},
	methods:{
		userDelete(index, id){
			axios.delete('/api/user/' + id)
					.then(response => {
						this.users.slice(id, 1)
						alert("削除します");
					})
					.catch(error => console.log(error));
		},
	},
	created(){
		axios.get('/api/user')
		.then(response=>{
			this.users=response.data.users;
		})
		.catch(error =>{
			console.log(error)
		});
	}
}
</script>