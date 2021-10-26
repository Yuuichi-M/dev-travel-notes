<template>
  <div>
    <button
      class="btn-sm shadow-none border border-deep-orange lighten-1 p-2"
      :class="buttonColor"
    >
      <i class="mr-1" :class="buttonIcon"></i>
      {{ buttonText }}
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isFollowedBy: false,
    };
  },
  computed: {
    buttonColor() {
      return this.isFollowedBy
        ? "bg-deep-orange lighten-1 text-white"
        : "bg-white";
    },
    buttonIcon() {
      return this.isFollowedBy ? "far fa-check-circle" : "fas fa-plus-circle";
    },
    buttonText() {
      return this.isFollowedBy ? "フォロー中" : "フォロー　";
    },
  },
};
</script>
