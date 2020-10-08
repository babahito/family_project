<template>
  <div>
    <button
      type="button"
      class="btn m-0 p-1 shadow-none btn_p"
    >
      <i class="fas fa-heart mr-1 heart_gray"
         :class="{'orange-text':this.isLikedBy}"
         @click="clickLike"
      >
      <span class="like_font">{{ countLikes }}</span></i>
    </button>
    
  </div>
</template>

<script>
  export default {
    props: {
      initialIsLikedBy: {
        type: Boolean,
        default: false,
      },
      initialCountLikes: {
        type: Number,
        default: 0,
      },
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
        isLikedBy: this.initialIsLikedBy,
        countLikes: this.initialCountLikes,
      }
    },
   methods: {
     clickLike() {
        if (!this.authorized) {
          alert('いいね機能はログイン中のみ使用できます')
          return
        }

        this.isLikedBy
          ? this.unlike()
          : this.like()
      },
      async like() {
        const response = await axios.put(this.endpoint)

        this.isLikedBy = true
        this.countLikes = response.data.countLikes
      },
      async unlike() {
        const response = await axios.delete(this.endpoint)

        this.isLikedBy = false
        this.countLikes = response.data.countLikes
      },
    },
  }
</script>
<style scoped>
.btn_p{
  z-index: 2;
  position:relative;
}
.like_font{
    font-size: 0.9rem;

}
</style>
