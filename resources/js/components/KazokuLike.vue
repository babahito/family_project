<template>
    <div>
    <button type="button" class="btn-sm shadow-none border border-primary p-2" 
    :class="buttonColor"
    @click="clickLike">
            <i
        class="mr-1"
        :class="buttonIcon"
      ></i>{{buttonText}}
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
    computed:{
      buttonColor(){
        return this.isKazokuBy
        ? 'bg-primary text-white'
        : 'bg-white'
      },
      buttonIcon() {
        return this.isKazokuBy
          ? 'fas fa-user-check'
          : 'fas fa-user-plus'
      },
      buttonText(){
        return this.isKazokuBy
        ? '参加中'
        : '参加する'
      }
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


