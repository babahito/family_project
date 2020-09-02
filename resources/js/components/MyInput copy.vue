<template>
    <div>
        <!-- get&axios -->
        <p v-show="errorFlag">サーバとの通信にエラーが発生しています</p>
        <input v-model="name"><br>
        <button v-on:click="createNewUser">作成</button>
        <ul>
            <li v-for="user in users" :key="user.id">{{ user.name }}:<button v-on:click="deleteUser(user.id)">削除</button></li>
        </ul>

        <p>{{myTitle}}</p>
        <form>
           <input type="text" id="title" v-model="myTitle">
        </form>

        <p><input type="file" v-on:change="fileSelected"></p>
        <button>アップロード</button>
    </div>
</template>

<script>
export default {
    name: "MyInput",
        data(){
            return{
                myTitle:' ',
                fileInfo:'',
                users:[],
                errorFlag: false
            }
        },
        methods: {
            fileSelected(event){
                this.fileInfo=event.target.files[0]
            },
            createNewUser(){
                axios.post('https://jsonplaceholder.typicode.com/users',{
                    name:this.name
                })
                .then(response => this.users.unshift(response.data))
                .catch(response=>console.log(response))            
            }

    
        },
            mounted :function(){
            // get
                axios.get('https://jsonplaceholder.typicode.com/user')
                    .then(response => this.users=response.data)
                          .catch(response =>{
                    console.log(response)
                    this.errorFlag = true;
                          }
                          )}
        // mounted :function(){
        //     // get
        //     axios.get('https://jsonplaceholder.typicode.com/users')
        //         .then(response => this.users=response.data)
        //         .catch(response => console.log(response))
        // }
        //   mounted :function(){
        //         axios.get('https://jsonplaceholder.typicode.com/users')
        //             .then(response => {
        //                 console.log(response.data)
        //                 console.log(response.status)
        //                 console.log(response.headers)
        //                 console.log(response.statusText)
        //                 console.log(response.config)
        //             })
        //                 .catch(response => console.log(response))
        //             }
    }
</script>

<style>
    p {
        margin: 10px;
    }
    .positive {
        color: blue;
    }
    .negative {
        color: red;
    }
    .warning{
        background-color:red;
    }

    
    /* https://reffect.co.jp/vue/vue-axios-learn */
</style>