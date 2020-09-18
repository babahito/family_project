<template>
  <div>
          <button
            class="btn-sm shadow-none border p-2"
            :class="buttonColor"
            @click="clickFollow" 
            >
            <i class="mr-1" :class="buttonIcon"></i>
              {{ buttonText }}
            </button> 
  </div>
</template>

<script>
  export default {
    props: {
      initialIsFollowedBy: {
        type: Boolean,
        default: false,
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
        isFollowedBy: this.initialIsFollowedBy,
      }
    },
    computed: {
      // CSS設定
      buttonColor() {
        return this.isFollowedBy
        
          ? 'pink_btn text-white'
          : 'pink_btn2 text-black'
          
      },
      buttonIcon() {
        return this.isFollowedBy
          ? 'fas fa-user-check'
          : 'fas fa-user-plus'
      },
      buttonText() {
        return this.isFollowedBy
          ? 'フォロー中'
          : 'フォロー'
      },
    },
    methods: {
      clickFollow() {
        // authがfalseの場合
        if (!this.authorized) {
          alert('ログインしてください')
          return
        }
        // authがtureの場合
        this.isFollowedBy
          ? this.unfollow() //フォロー中
          : this.follow()　//フォローしていなければ
      },
        async follow() {
          const response = await axios.put(this.endpoint)

          this.isFollowedBy = true
        },
        async unfollow() {
          const response = await axios.delete(this.endpoint)

          this.isFollowedBy = false
        },
    },
    //==========ここまで追加==========
  }
</script>