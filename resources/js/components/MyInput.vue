<template>
    <div>
        <p>{{fileInfo.name}}</p>
        <input type="file" v-on:change="fileSelected">
        <button v-on:click="fileUpload">アップロード</button>
    </div>
</template>

<script>
export default {
    name: "MyInput",
        data(){
            return{
                // myTitle:' ',
                fileInfo:''
 
            }
        },
        methods: {
            fileSelected(event){
                this.fileInfo=event.target.files[0]
            },
            fileUpload(){
                const formData=newFormData()

                formData.append('file',this.fileInfo)

                axioss.post('/api/fileupload',formData).then(response=>{
                    console.log(response)
                })
            }
        }
            // createNewUser(){
            //     axios.post('https://jsonplaceholder.typicode.com/users',{
            //         name:this.name
            //     })
            //     .then(response => this.users.unshift(response.data))
            //     .catch(response=>console.log(response))            
            //     }
            // },
            // mounted :function(){

   
                // axios.get('https://jsonplaceholder.typicode.com/user')
                //     .then(response => this.users=response.data)
                //           .catch(response =>{
                //             console.log(response)
                //             this.errorFlag = true;
                //           }
                    // )}
                // }
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