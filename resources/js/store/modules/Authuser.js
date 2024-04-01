const state = {
  authuser: null,
};
const getters = {};
const actions = {
  getAuthuser({ commit }) {
    axios.get(`/api/authuser`).then(response => {
      commit('setAuthuser', response.data);
    }).catch(error => {
      commit('setAuthuser', null);
    });
  },
};
const mutations = {
  setAuthuser(state, authuser) {
    state.authuser = authuser;
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
}