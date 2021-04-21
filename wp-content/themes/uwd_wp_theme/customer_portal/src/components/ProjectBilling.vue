<template>
  <div class="project-billing">
    <h1 class="billing-header">Billing Status</h1>
    <p class="billing-subheader">Payment Amount Due:</p>
    <p class="billing-subheader">Last Payment:</p>
    <p class="billing-body">Find the data</p>
    <p class="billing-subheader">Remaining Balance:</p>
    <p class="billing-body">${{ remainingBalance }}</p>
  </div>
</template>

<script>
export default {
  name: "ProjectBilling",
  props: ["projects"],
  computed: {
    remainingBalance() {
      let balance = this.projects.gsa;

      return `${Math.floor(balance)
        .toString()
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",")} `;
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../scss/_variables.scss";

.project-billing {
  text-align: left;
}
.billing-header {
  font: $header-font;
  color: $secondary-dark-text;
  text-transform: uppercase;
}
.billing-subheader {
  font: $style-font;
  color: $ltgrey-text;
}
.billing-body {
  font: $body-font;
  color: $ltgrey-text;
  font-style: oblique;
  margin: 0;
  padding: 5px 0;
  display: flex;
  justify-content: space-between;
}
</style>
