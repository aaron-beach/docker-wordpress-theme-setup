<template>
  <div>
    <simple-modal v-model="isShow" v-bind:service="service">
      <template v-slot="{ service }">
        <p class="service-status">
          Current Status: {{ service.JobStatus }}, Entered on:{{
            service.EnteredOnDate
          }}
        </p>
        <p class="service-category">Issue: {{ service.ServiceCategory }}</p>
        <p class="service-complete-date">
          Completed on: {{ service.ActCompleteDate }}
        </p>

        No Details Available.
      </template>
      <template slot="footer">
        <button>OK</button>
      </template>
    </simple-modal>
    <button @click="isShow = !isShow">See Details</button>
  </div>
</template>

<script>
import SimpleModal from "simple-modal-vue";
export default {
  name: "SimpleModalExample",
  components: { SimpleModal },
  data() {
    return { isShow: false };
  }
};
</script>
