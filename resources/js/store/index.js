import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import Authuser from './modules/Authuser';

const state = {};
const actions = {};
const mutations = {};
const modules = {
    Authuser,
  };

export default new Vuex.Store({
  state,
  mutations,
  actions,
  modules,
});