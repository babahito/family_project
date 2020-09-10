<template>
    <div>
    <button type="button" class="btn shadow-none" @click="clickLike">
      参加ボタン
    </button>
    {{countKazokus}}
    </div>
</template>

<script>
export default {
    name: "KazokuLike",
    props: {
      initialIsKazokuBy: {
        type: Boolean,
        default: false,
      },
      initialCountKazokus:{
        type:Number,
        default:0,
      } ,
      authorized: {
        type: Boolean,
        default: false,
      },
      endpoint: {
        type: String,
      },
    },
    data() {
      return {
        isKazokuBy: this.initialIsKazokuBy,
        countKazokus: this.initialCountKazokus,
      }
    },
    methods:{
      clickLike(){
        if (!this.authorized) {
          alert('ログインしてください')
          return 
        }
        this.isKazokuBy
          ? this.unlike()
          : this.like()
      },
      async like(){
        const response = await axios.put(this.endpoint)

        this.isKazokuBy=true
        this.countKazokus=response.data.countKazokus
      },
      async unlike(){
        const response = await axios.delete(this.endpoint)

        this.isKazokuBy=false
        this.countKazokus=response.data.countKazokus
      },
      
    },
}

</script>


