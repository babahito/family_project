<template>
	<v-app>
		<h1>ユーザ更新</h1>
		<form @submit.prevent="updateUser">
				<v-text-field v-model="user.name" label="名前"></v-text-field>
				<v-text-field v-model="user.email" label="メールアドレス"></v-text-field>
			<button type="submit" class="pink_btn">更新</button>
		</form>
	</v-app>
</template>

<script>
	export default {
		data(){
			return {
				id: this.$route.params.id,
				user:{
					id:'',
					name: '',
					email:''
				}
			}
		},
		methods:{
			updateUser(){
				axios.patch('/api/user/' + this.user.id,{
					user: this.user
				})
				.then(response => {
					this.user = response.data.user;
					this.$router.push({ name: 'user_detail' ,params :{ id: this.$route.params.id }})
				})
				.catch(error => console.log(error));
			},
		},
		created(){
			axios.get('/api/user/' + this.id)
			.then(response => this.user = response.data.user)
			.catch(erorr => console.log(error));
		}

	}
</script>
<style scoped>
.pink_btn{
    background:#EEB0D2;
    color:#fff;
    border:1px solid #fff;
    padding:10px 0;
    /* float:right; */
    width:100%;
    color:#fff;
    text-align: center;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.3);
    transition: color 1s, background 1s;
    font-size:1.2rem;
}
    .pink_btn:hover{
        background:#EB8ABE;
        box-shadow: 0 0 2px rgba(0,0,0,0.2); 
        border:1px solid #EB8ABE;
    }
</style>