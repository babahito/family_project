<template>
    <div>
        <p>
            Count : <span>{{ counter }}</span>
        </p>

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