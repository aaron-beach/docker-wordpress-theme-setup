<template>
  <div class="box">
    <p class="service-body">Service #{{ service.id }} |</p>

    <p class="service-status">
      Current Status: {{ service.JobStatus }}, Entered on:{{
        service.EnteredOnDate
      }}
    </p>
    <p class="service-category">Issue: {{ service.ServiceCategory }}</p>
    <p class="service-complete-date">
      Completed on: {{ service.ActCompleteDate }}
    </p>
    <p>{{ $props.service }}</p>
    <button type="button" @click="closeModal">Close modal</button>
  </div>
</template>

<script>
export default {
  name: "ServiceDetails",
  props: {
    service: {
      required: true
    },
    bar: {
      type: String,
      required: true
    }
  },
  methods: {
    emitEvent() {
      this.$emit("submit", { foo: this.foo, bar: this.bar });
    },
    closeModal() {
      this.$modal.close();
    }
  },
  modal: {
    classes: ["baz", "poo", { javascript: true, jQuery: false }],
    label: "Foo bar",
    attributes: {
      "data-test": "foo"
    }
  }
};
</script>

<style>
.box {
  padding: 16px;
  background-color: lightgrey;
  width: 50vw;
  display: flex;
  flex-direction: column;
  margin: 0 auto 0 auto;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.48s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
