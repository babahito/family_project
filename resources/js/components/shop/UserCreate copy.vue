<template>
    <div>
        <h1>ユーザー作成</h1>
        <form @submit.prevent="createUser">
            <div>
                <label for="name">名前：</label>
                <input v-model="user.name">
            </div>
            <div>
                <label for="email">メール：</label>
                <input v-model="user.email">
            </div>
            <div>
                <label for="password">パスワード：</label>
                <input v-model="user.password">
            </div>
            <button type="submit">作成</button>
        </form>
    </div>
</template>
<script>
export default {
    data(){
        return{
            user:{
                name:'',
                email:'',
                password:''
            }
        }
    },
    methods:{
        createUser(){
            axios.post('/api/user',{user:this.user})
                .then(response=>{
                    this.user=response.data.user;
                    this.$router.push({name:'user'})
                })
                .catch(error=>console.log(error))
        }
    }
}
</script>