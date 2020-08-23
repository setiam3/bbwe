import Vue from 'vue';
import Vuex from 'vuex';
import group from './example/group';
import axios from 'axios';
import settings from './../config/settings';

Vue.use(Vuex)

const chatroomStore = new Vuex.Store({
  state: {
    groups: group,
    group_selected: {

    },
    attach_active: '',
    attach_record_status: ''
  },
  mutations: {
    setGroup(state, data) {
      if (data) {
        state.group_selected = data;
      } else {
        state.group_selected = {};
      }
    },
    setAttachActive(state, data) {
      state.attach_active = data;
    },
    setRecordStatus(state, data) {
      state.attach_record_status = data;
    },
    async getGroups(state) {
      let {data} = await axios.get(settings.api_host + '/chatrooms');
      if(data.data){
        state.groups=data.data.groups;
      }
    }
  }
});

export default chatroomStore;
