<template>
    <div>
        <button type="button" class="btn m-0 p-1 shadow-none">
            <i class="fas fa-heart mr-1"/>
        </button>
        <p>
           {{counter}}
        </p>
        <button v-on:click="increment">+1</button>
    </div>
    
</template>
<script>
  export default {
    name: "ArticleLike",
     data () {
        return {
            counter: 0
        }
    },
    methods: {
        increment:function(){
            alert('increment');
        }
    }
  }
</script>