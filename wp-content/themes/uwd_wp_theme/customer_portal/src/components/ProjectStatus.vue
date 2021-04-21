<template>
  <div class="project-status">
    <h1 class="status-header">Job Status</h1>
    <p class="status-subheader">
      Est. Install Date *
      {{ projects.EstInstallEndDate.substring(0, 10).replace(/-/g, "/") }}
    </p>
    <h3>Current Job Status: {{ projects.JobStatus }}</h3>
    <b-progress :max="max" height="10px">
      <b-progress-bar
        variant="success"
        :value="projectProgress[0]"
        animated
      ></b-progress-bar>
      <b-progress-bar
        variant="success"
        :value="projectProgress[1]"
        animated
      ></b-progress-bar>
      <b-progress-bar
        variant="success"
        :value="projectProgress[2]"
        animated
      ></b-progress-bar>
      <b-progress-bar
        variant="success"
        :value="projectProgress[3]"
        animated
      ></b-progress-bar>
      <b-progress-bar
        variant="success"
        :value="projectProgress[4]"
        animated
      ></b-progress-bar>
    </b-progress>
    <p
      id="status-agreement"
      class="status-body"
      :class="currentStep == 0 ? 'current-step' : ''"
    >
      Your Agreement Date
      <span>
        {{ projects.apptdate.substring(0, 10).replace(/-/g, "/") }}
      </span>
    </p>
    <p class="status-body" :class="currentStep == 1 ? 'current-step' : ''">
      Measured Your Product
      <span id="status-measured">{{
        projects.ActMeasureDate
          ? projects.ActMeasureDate.substring(0, 10).replace(/-/g, "/")
          : projects.EstMeasureDate.substring(0, 10).replace(/-/g, "/")
      }}</span>
    </p>
    <p class="status-body" :class="currentStep == 2 ? 'current-step' : ''">
      Ordered Your Product
      <span>
        {{
          projects.ActOrderDate
            ? projects.ActOrderDate.substring(0, 10).replace(/-/g, "/")
            : projects.EstOrderDate.substring(0, 10).replace(/-/g, "/")
        }}
      </span>
    </p>
    <p class="status-body" :class="currentStep == 3 ? 'current-step' : ''">
      Delivery to Our Warehouse
      <span>
        {{
          projects.ActDeliveryDate
            ? projects.ActDeliveryDate.substring(0, 10).replace(/-/g, "/")
            : projects.EstDeliveryDate.substring(0, 10).replace(/-/g, "/")
        }}
      </span>
    </p>
    <p class="status-body" :class="currentStep == 4 ? 'current-step' : ''">
      Installation Date
      <span>
        {{
          projects.ActCompleteDate
            ? projects.ActCompleteDate.substring(0, 10).replace(/-/g, "/")
            : projects.EstCompleteDate.substring(0, 10).replace(/-/g, "/")
        }}
      </span>
    </p>
  </div>
</template>

<script>
export default {
  name: "ProjectStatus",
  props: ["projects"],
  data() {
    return {
      max: 100
    };
  },
  computed: {
    currentStep() {
      let current = 0;
      if (this.projects.ActCompleteDate) {
        current = 4;
      } else if (this.projects.ActDeliveryDate) {
        current = 3;
      } else if (this.projects.ActOrderDate) {
        current = 2;
      } else if (this.projects.ActMeasureDate) {
        current = 1;
      }
      return current;
    },
    projectProgress: function() {
      let progress = [0, 0, 0, 0, 0];
      this.projects.apptdate ? (progress[0] = 20) : (progress[0] = 0);
      this.projects.ActMeasureDate ? (progress[1] = 20) : (progress[1] = 0);
      this.projects.ActOrderDate ? (progress[2] = 20) : (progress[2] = 0);
      this.projects.ActDeliveryDate ? (progress[3] = 20) : (progress[3] = 0);
      this.projects.ActCompleteDate ? (progress[4] = 20) : (progress[4] = 0);
      return progress;
    }
  }
};
</script>

<style scoped lang="scss">
@import "../scss/_variables.scss";
.project-status {
  text-align: left;
}
.status-header {
  font: $header-font;
  color: $secondary-dark-text;
  text-transform: uppercase;
}
.status-subheader {
  font: $style-font;
  color: $ltgrey-text;
}
.status-body {
  font: $body-font;
  color: $ltgrey-text;
  font-style: oblique;
  margin: 0;
  padding: 5px 0;
  display: flex;
  justify-content: space-between;
}
#status-agreement {
  padding-top: 20px;
}
.current-step {
  color: $accent-green-text;
}
</style>
