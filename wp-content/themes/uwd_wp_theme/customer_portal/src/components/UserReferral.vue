<template>
  <div class="user-referral">
    <b-card class="card" no-body>
      <div class="card-header referral-header">Referral Details</div>
      <b-card-body class="card-body">
        <a href="#" class="btn btn-primary referral-btn">Submit a Referral</a>
        <h4 class="card-title  referral-subheader">Referral History</h4>
        <b-list-group flush>
          <b-list-group-item
            class="list-group-item"
            v-for="item in $store.state.referrals"
            :key="item.custnumber"
          >
            <p class="referral-body">
              Referral #{{ item.custnumber }} |
              <span class="referral-status"
                >{{ item.firstname }} {{ item.lastname }} | Status:
                {{ item.dsp_id }}</span
              >
            </p>
          </b-list-group-item>
        </b-list-group>
      </b-card-body>
    </b-card>
  </div>
</template>

<script>
export default {
  name: "UserReferral"
};
</script>

<style scoped lang="scss">
@import "../scss/_variables.scss";
.user-referral {
  min-width: 45vw;
  width: 100%;
  text-align: left;
  align-content: space-between;
  justify-content: space-between;
}
.referral-header {
  font: $title-font;
  color: $secondary-dark-text;
  text-transform: uppercase;
  &.card-header {
    background-color: $primary-color !important;
    color: $primary-lite-text;
    font: $title-font;
    text-align: left;
    height: 38pt;
    border-radius: 4pt 4pt 0 0;
    padding-left: 10px;
    margin: 0;
    text-transform: uppercase;
  }
}
.referral-subheader {
  font: $style-font;
  color: $ltgrey-text;
}
.card-body {
  display: flex;
  align-items: stretch;
  flex-direction: column;
}
.referral-body {
  font: $body-font;
  color: $ltgrey-text;
  font-style: oblique;
  margin: 0;
  padding: 5px 0;
  display: flex;
  justify-content: space-between;
}
.referral-btn {
  margin: auto;
  width: 200px;
  background-color: $accent-green-text;
  text-transform: uppercase;
}
.referral-status {
  font: $style-font;
  color: $ltgrey-text;
}
</style>
