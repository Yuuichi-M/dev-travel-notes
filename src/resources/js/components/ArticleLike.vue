<template>
  <div>
    <!--いいねボタン-->
    <!--赤アイコン-->
    <button type="button" class="btn m-0 p-1 shadow-none">
      <span class="grey-text">
        <i
          class="fas fa-heart mr-1"
          :class="{ 'red-text': this.isLikedBy }"
          @click="clickLike"
        />
      </span>
    </button>
    <!--いいねカウント-->
    {{ countLikes }}
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
    };
  },
  methods: {
    clickLike() {
      if (!this.authorized) {
        alert("ログインをしてください");
        return;
      }

      this.isLikedBy ? this.unlike() : this.like();
    },
    async like() {
      const response = await axios.put(this.endpoint);

      this.isLikedBy = true;
      this.countLikes = response.data.countLikes;
    },
    async unlike() {
      const response = await axios.delete(this.endpoint);

      this.isLikedBy = false;
      this.countLikes = response.data.countLikes;
    },
  },
};
</script>
