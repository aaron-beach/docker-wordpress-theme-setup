<template>
  <div class="user-service">
    <b-card class="card" no-body>
      <div class="card-header service-header">Ticket Details</div>
      <b-card-body class="card-body">
        <a href="#" class="btn btn-primary service-btn">Submit a Ticket</a>
        <h4 class="card-title  service-subheader">
          Ticket History
        </h4>
        <b-list-group flush>
          <b-list-group-item
            class="list-group-item"
            v-for="service in $store.state.services"
            :key="service.id"
          >
            <div class="service-container">
              <p class="service-body">Service #{{ service.id }} |</p>
              <p class="service-status">
                Current Status: {{ service.JobStatus }}, Entered on:{{
                  service.EnteredOnDate
                }}
              </p>
              <button type="button" @click="openModal">Open modal</button>
              <vue-accessible-modal
                v-bind="service"
                @show="showHandler"
                @close="closeHandler"
              >
                <template v-slot:backdrop></template>
              </vue-accessible-modal>
            </div>
          </b-list-group-item>
        </b-list-group>
      </b-card-body>
    </b-card>
  </div>
</template>

<script>
import ServiceDetails from "./ServiceDetails.vue";
export default {
  name: "UserService",
  data: function() {
    return {
      isShow: true
    };
  },
  methods: {
    openModal() {
      this.$modal.show(ServiceDetails, {
        props: {
          service: "foo",
          bar: "bar"
        },
        listeners: { submit: data => console.log(data) },
        label: "Details",
        classes: "foo bar",
        attributes: {
          id: "service-modal"
        }
        // transition: "rotate-in"
      });
    }
  },
  showHandler() {
    console.log("[vue-accessible-modal EMIT]: show");
  },
  closeHandler() {
    console.log("[vue-accessible-modal EMIT]: close");
  }
};
</script>

<style scoped lang="scss">
@import "../scss/_variables.scss";
// @import "~vue-accessible-modal/src/styles/core.scss";
.user-service {
  min-width: 45vw;
  width: 100%;
  text-align: left;
  align-content: space-between;
  justify-content: space-between;
}
.service-header {
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
.service-subheader {
  font: $style-font;
  color: $ltgrey-text;
}
.card-body {
  display: flex;
  align-items: stretch;
  flex-direction: column;
}
.service-body {
  font: $body-font;
  color: $ltgrey-text;
  font-style: oblique;
  margin: 0;
  padding: 5px 0;
  display: flex;
  justify-content: space-between;
}
.service-btn {
  margin: auto;
  width: 200px;
  background-color: $accent-green-text;
  text-transform: uppercase;
}
.service-status {
  font: $style-font;
  color: $ltgrey-text;
}
.service-container {
  display: flex;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.48s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
.rotate-in-enter-active,
.rotate-in-leave-active {
  transition: transform 0.48s;
}
.rotate-in-enter,
.rotate-in-leave-to {
  transform: rotate3d(0, 0, 1, -192deg);
}
</style>
