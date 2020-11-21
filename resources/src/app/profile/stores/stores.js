import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import contact from './contact';

Vue.use(Vuex);

const stores = new Vuex.Store({
    modules: {
        contact: contact
    },
    state: {
        user: {},
        members:[]
    },
    mutations: {
        setUser(state, data) {
            state.user = data;
        },
        setMembers(state,data){
            state.members=data;
        },
    },
    getters: {

    },
    actions: {
        getMembers({commit}){
            let request = axios.get('/profile/member-list');
            request.then((res)=>{
                commit('setMembers',res.data);
            })
        }
    }
});

export default stores;