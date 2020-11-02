<template>
<v-app>
    <div>
        <h1>ユーザー作成</h1>
        <form @submit.prevent="createUser">
            <v-text-field v-model="user.name" label="名前"></v-text-field>
            <v-text-field v-model="user.email" label="メールアドレス"></v-text-field>
            <v-text-field v-model="user.password" label="パスワード"></v-text-field>

            <button type="submit" class="pink_btn">作成</button>
        </form>
    </div>
    </v-app>
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
        },
        submit() {
            console.log("submit!")
        // 送信処理
        }
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