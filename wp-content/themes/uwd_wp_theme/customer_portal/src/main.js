import Vue from "vue";
import BootstrapVue from "bootstrap-vue";
import App from "./App.vue";
import store from "./store";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import VueAccessibleModal from "vue-accessible-modal";

Vue.use(BootstrapVue);
Vue.config.productionTip = false;

// optional options
const options = {
  transition: "fade"
};

Vue.use(VueAccessibleModal, options);

new Vue({
  el: '#wp-vue-app',
  store,
  render: h => h(App)
})
