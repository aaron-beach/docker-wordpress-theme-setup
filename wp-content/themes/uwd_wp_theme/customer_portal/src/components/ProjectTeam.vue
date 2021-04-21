<template>
  <div class="project-team">
    <h1 class="team-header">Project Team</h1>
    <p class="team-body">
      {{ projects.SalesRepName1 }} - Salesperson, Contact link
    </p>
    <p class="team-body">
      {{ projects.InstallerName1 }} - Master Installer, Contact link
    </p>
  </div>
</template>

<script>
export default {
  name: "ProjectTeam",
  props: ["projects"]
};
</script>

<style scoped lang="scss">
@import "../scss/_variables.scss";

.project-team {
  text-align: left;
}
.team-header {
  font: $header-font;
  color: $secondary-dark-text;
  text-transform: uppercase;
}
.team-subheader {
  font: $style-font;
  color: $ltgrey-text;
}
.team-body {
  font: $body-font;
  color: $ltgrey-text;
  font-style: oblique;
  margin: 0;
  padding: 5px 0;
  display: flex;
  justify-content: space-between;
}
</style>
