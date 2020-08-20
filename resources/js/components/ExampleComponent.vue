<template>
    <div>
        <p>
            Count : <span>{{ counter }}</span>
        </p>
        <!-- <input type="text" v-model="user">
        {{user}} -->
        <!-- <input v-if="formType==='user'" type="text" placeholder="ユーザー名">
        <input v-else-if="formType==='password'" type="text" placeholder="パスワード">
        <input v-else type="text" placeholder="住所">
        <button @click="change">change</button> -->
        <!-- <button v-on:click="increment()">+1</button>
        <div>
            <img v-bind:src="imgPath" :width="wid">
        </div>
        <button @click="tyoko">チョコ</button>
        <button @click="tukuru">マドレーヌ</button>
        <button @click="wid600">600に拡大</button>

        <div v-bind:class="{warning :isActive}">注意！</div>
        <button @click="tyuui">警告</button> -->

    </div>
</template>

<script>
export default {
    name: "ExampleComponent",
    data () {
        return {
            counter: 0,
            // imgPath:"",
            // wid:100,
            // isActive:false
            // formType:"password"
            // user:""
        }
        
    },
    methods: {
        increment:function(){
            this.counter++;
        },
        // change:function(){
        //     this.formbox=!this.formbox
        // }
        // tyoko:function(){
        //     this.imgPath="https://silsmaria1982.itembox.design/item/item_dammy002.jpg"
        // },
        // tukuru:function(){
        //     this.imgPath="https://silsmaria1982.itembox.design/item/item_dammy006.jpg"
        // },
        // wid600:function(){
        //     this.wid=600
        // },
        // tyuui:function(){
        //     this.isActive=!this.isActive
        // }

    }
}
</script>

<style scoped>
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
</style>