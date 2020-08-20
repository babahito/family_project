<template>
    <div>
        <p>こんにちは、{{message}}さん</p>
        <p>
            Count : <span>{{ counter }}</span>
        </p>
        <button v-on:click="increment()">+1</button>

    </div>
</template>

<script>
export default {
    name: "ExampleComponent",
    data () {
        return {
            counter: 0,
        }
        
    },
    props:['message'],
    methods: {
        increment:function(){
            this.counter++;
        },

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