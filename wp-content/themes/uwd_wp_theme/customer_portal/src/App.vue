<template>
  <div id="app">
    <UserPortal />
  </div>
</template>

<script>
import UserPortal from "./components/UserPortal";

export default {
  name: "App",
  components: {
    UserPortal
  }
};
</script>

<style lang="scss">
@import "./scss/_variables.scss";

#app {
  font-family: futura-pt-bold, sans-serif;
  font-style: normal;
  font-weight: 700;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: $primary-dark-text;
}
</style>