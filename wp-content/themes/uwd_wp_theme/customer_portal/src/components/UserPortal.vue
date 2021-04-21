<template>
  <div class="user-portal portal-container" v-if="LoggedIn">
    <user-details class="user-details"></user-details>
    <ProjectTable class="user-project" />
    <UserService class="user-service" />
    <UserReferral class="user-refer" />
  </div>
  <div class="user-portal" v-else>
    <user-form class="user-form"></user-form>
  </div>
</template>

<script>
import UserForm from "./UserForm.vue";
import ProjectTable from "./ProjectTable";
import UserReferral from "./UserReferral";
import UserService from "./UserService";
import UserDetails from "./UserDetails";

export default {
  name: "UserPortal",
  data() {
    return {};
  },
  components: {
    ProjectTable,
    UserService,
    UserReferral,
    UserForm,
    UserDetails
  },
  computed: {
    LoggedIn: function() {
      if (this.$store.getters.logged) {
        return true;
      }
      return false;
    }
  }
};
</script>

<style scoped lang="scss">
@import "../scss/_variables.scss";

.user-form {
  max-width: 600px;
  width: 100%;
  margin: 0 auto;
}

.user-portal {
  max-width: 1440px;
  padding: 24px;
  &.portal-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: auto;
    grid-template-areas:
      "header header"
      "project project"
      "service refer";
    column-gap: 16px;
    row-gap: 16px;
  }
}
@media (max-width: 900px) {
  .user-portal.portal-container {
    grid-template-areas:
      "header header"
      "project project"
      "service service"
      "refer refer";
  }
}

.user-details {
  grid-area: header;
}
.user-project {
  grid-area: project;
}
.user-service {
  grid-area: service;
}
.user-refer {
  grid-area: refer;
}
</style>
