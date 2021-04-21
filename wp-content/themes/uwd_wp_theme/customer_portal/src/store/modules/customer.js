// import Axios from "axios";

const state = {
  customer: {}
};
const getters = {
  CUSTOMERS: state => {
    return state.customer;
  }
};
const mutations = {
  SET_CUSTOMER(state, payload) {
    state.customer = payload.customer;
  }
};
const actions = {};

export default {
  state,
  getters,
  mutations,
  actions
};
