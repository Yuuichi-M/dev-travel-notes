<template>
  <div>
    <button
      class="btn-sm shadow-none border border-wight p-2"
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
    };
  },
  computed: {
    buttonColor() {
      return this.isFollowedBy ? "bg-muted text-body" : "bg-dark text-white";
    },
    buttonIcon() {
      return this.isFollowedBy ? "fas fa-check" : "fas fa-plus";
    },
    buttonText() {
      return this.isFollowedBy ? "フォロー中" : "フォロー　";
    },
  },
  methods: {
    clickFollow() {
      if (!this.authorized) {
        alert("ログインをしてください");
        return;
      }

      this.isFollowedBy ? this.unfollow() : this.follow();
    },
    async follow() {
      const response = await axios.put(this.endpoint);

      this.isFollowedBy = true;
    },
    async unfollow() {
      const response = await axios.delete(this.endpoint);

      this.isFollowedBy = false;
    },
  },
};
</script>
