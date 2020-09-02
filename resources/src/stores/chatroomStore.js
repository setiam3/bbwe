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
    attach_record_status: '',
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
      let { data } = await axios.get(settings.api_host + '/chatrooms',{
        headers: settings.header_request
      });
      if (data.data) {
        state.groups = data.data.groups;
      }
    },
    async getChatByGroup(state, group_id) {
      let { data } = await axios.get(settings.api_host + '/chatrooms/chat-message/' + group_id,{
        headers: settings.header_request
      });
      if (data.status_code == 200) {
        if (data.data) {
          state.group_selected = data.data;
        }
      }

    },
    async sendMessage(state, params) {
      let { data } = await axios.post(settings.api_host + `/chatrooms/chat-message/${params.group_id}`, {
        message: params.message
      },{
        headers: settings.header_request
      });
      if (data) {
        await this.commit('getChatByGroup', params.group_id);
      }
    }
  }
});

export default chatroomStore;
