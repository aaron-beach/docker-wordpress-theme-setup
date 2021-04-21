<template>
  <div class="project-finance">
    <h1 class="finance-header">Financing</h1>
    <p class="finance-body">Contact Information for lending institutions</p>
  </div>
</template>

<script>
export default {
  name: "ProjectFinance",
  props: ["projects"]
};
</script>

<style scoped lang="scss">
@import "../scss/_variables.scss";

.project-finance {
  text-align: left;
}
.finance-header {
  font: $header-font;
  color: $secondary-dark-text;
  text-transform: uppercase;
}
.finance-subheader {
  font: $style-font;
  color: $ltgrey-text;
}
.finance-body {
  font: $body-font;
  color: $ltgrey-text;
  font-style: oblique;
  margin: 0;
  padding: 5px 0;
  display: flex;
  justify-content: space-between;
}
</style>
