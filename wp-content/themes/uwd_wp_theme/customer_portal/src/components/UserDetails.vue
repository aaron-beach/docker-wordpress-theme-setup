<template>
  <div class="user-details">
    <h1>Hi {{ users.firstname }}!</h1>
    <p>{{ users.Address1 }} {{ users.City }}, {{ users.State }}</p>
  </div>
</template>

<script>
export default {
  name: "UserDetails",
  computed: {
    users() {
      return this.$store.state.customer;
    }
  }
};
</script>

<style lang="scss" scoped>
.user-details {
  width: 90vw;
  text-align: left;
}
</style>
