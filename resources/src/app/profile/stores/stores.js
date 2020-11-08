import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const stores = new Vuex.Store({
    state: {
        user: {}
    },
    mutations: {
        setUser(state, data) {
            state.user = data;
        }
    },
    getters: {

    },
    actions: {

    }
});

export default stores;