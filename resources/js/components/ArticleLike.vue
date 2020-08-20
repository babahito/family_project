<template>
    <div>
    <button type="button" class="btn m-0 p-1 shadow-none">
      <i class="fas fa-heart mr-1"
      :class="{'red-text':this.isLikedBy}" 
      />
    </button>
    {{ countLikes }}
    </div>
</template>

<script>
export default {
    name: "ArticleLike",
    // props:['postId'],
    props: {
      initialIsLikedBy: {
        type: Boolean,
        default: false,
      },
        initialCountLikes: {
        type: Number,
        default: 0,
      },
    },
    data() {
      return {
        isLikedBy: this.initialIsLikedBy,
        countLikes: this.initialCountLikes,
      }
    },
  }
</script>

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