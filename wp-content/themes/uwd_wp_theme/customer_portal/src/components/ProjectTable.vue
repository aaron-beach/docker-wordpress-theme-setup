<template>
  <div class="project-table">
    <h1 class="header">Order Details</h1>
    <div id="tabs">
      <b-tabs nav-class="project-tab" align="left">
        <b-tab
          v-for="i in projects"
          :key="i.contractid"
          :title="'JOB # ' + i.contractid"
          title-item-class="project-tab--header"
          active
        >
          <div class="project-container">
            <div class="overview">
              <h1>{{ i.productid }}</h1>
              <p>
                Lorem ipsum dolor sit amet, qui minim labore adipisicing minim
                sint cillum sint consectetur cupidatat.
              </p>
            </div>
            <project-status class="status" :projects="i"></project-status>
            <project-billing class="billing" :projects="i"></project-billing>
            <project-team class="team" :projects="i"></project-team>
            <project-finance class="finance" :projects="i"></project-finance>
          </div>
        </b-tab>
      </b-tabs>
    </div>
  </div>
</template>

<script>
import ProjectBilling from "./ProjectBilling.vue";
import ProjectFinance from "./ProjectFinance.vue";
import ProjectStatus from "./ProjectStatus.vue";
import ProjectTeam from "./ProjectTeam";

export default {
  name: "ProjectTable",
  components: { ProjectStatus, ProjectFinance, ProjectBilling, ProjectTeam },
  computed: {
    projects: function() {
      return this.$store.getters.projects;
    }
  }
};
</script>

<style lang="scss">
@import "../scss/_variables.scss";

.header {
  background-color: $primary-color;
  color: $primary-lite-text;
  font: $title-font;
  text-align: left;
  height: 38pt;
  line-height: 38pt;
  border-radius: 4pt 4pt 0 0;
  padding-left: 10px;
  margin: 0;
  text-transform: uppercase;
}
.project-tab {
  background-color: $background-grey;
}
.project-tab--header {
  & > a {
    background-color: transparent !important;
    margin-left: 100px;
    border-bottom: 0px solid transparent !important;
    color: $ltgrey-text;
  }
  & > a.active {
    border-bottom: 2px solid $accent-green-text !important;
    color: $accent-green-text !important;
  }
}

.project-container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: auto;
  grid-template-areas:
    "overview overview"
    "status billing"
    "team finance";
  margin: 0 2.55em;
  column-gap: 48px;
  row-gap: 24px;
}
@media (max-width: 750px) {
  .project-container {
    grid-template-areas:
      "overview overview"
      "status status"
      "billing billing"
      "team team"
      "finance finance";
  }
}

.overview {
  color: $secondary-dark-text;
  grid-area: overview;
  text-align: left;
  & > h1 {
    margin: 24px 0 0 0;
    font: $header-font;
    text-transform: uppercase;
  }
  & > p {
    font: $body-font;
  }
}

.finance {
  grid-area: finance;
}

.team {
  grid-area: team;
}

.billing {
  grid-area: billing;
}

.status {
  grid-area: status;
}
</style>
