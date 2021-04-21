<template>
  <div class="user-form">
    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
      <b-form-group
        id="input-group-1"
        label="Phone Number:"
        label-for="input-1"
        description="Enter the phone associated with your account."
      >
        <b-form-input
          id="input-1"
          v-model="form.phone"
          placeholder="Enter phone 0000000000"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group
        id="input-group-2"
        label="Your Last Name:"
        label-for="input-2"
      >
        <b-form-input
          id="input-2"
          v-model="form.lastname"
          placeholder="Enter last name"
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-3" label="Your Job Id:" label-for="input-3">
        <b-form-input
          id="input-3"
          v-model="form.jobid"
          placeholder="Enter Job Id"
        ></b-form-input>
      </b-form-group>

      <b-button type="submit" variant="primary">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
    </b-form>
    <b-card class="mt-3" header="Form Data Result">
      <pre class="m-0">{{ form }}</pre>
    </b-card>
  </div>
</template>

<script>
export default {
  name: "UserForm",
  data() {
    return {
      form: {
        phone: "",
        lastname: "",
        jobid: null
      },
      show: true
    };
  },
  methods: {
    onSubmit(event) {
      event.preventDefault();
      this.$store.dispatch("setLogin", true);
      this.$store.dispatch("LOAD_PORTAL", this.form);
    },
    onReset(event) {
      event.preventDefault();
      // Reset our form values
      this.form.phone = "";
      this.form.lastname = "";
      this.form.JobId = null;
      this.$store.dispatch("setLogin", false);
      // Trick to reset/clear native browser form validation state
      this.show = false;
      this.$nextTick(() => {
        this.show = true;
      });
    }
  }
};
</script>
