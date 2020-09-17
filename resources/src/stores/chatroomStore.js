import Vue from 'vue';
import Vuex from 'vuex';
import group from './example/group';
import axios from 'axios';
import settings from './../config/settings';

Vue.use(Vuex)

const chatroomStore = new Vuex.Store({
  state: {
    groups: [],
    group_selected: {

    },
    attach_active: '',
    attach_record_status: '',
    contacts: []
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
    setContacts(state, data) {
      state.contacts = data;
    },
    async getGroups(state) {
      let { data } = await axios.get(settings.api_host + '/chatrooms', {
        headers: settings.header_request
      });
      if (data.data) {
        state.groups = data.data.groups;
      }
    },
    async getChatByGroup(state, group_id) {
      let { data } = await axios.get(settings.api_host + '/chatrooms/chat-message/' + group_id, {
        headers: settings.header_request
      });
      if (data.status_code == 200) {
        if (data.data) {
          this.commit('setGroup', data.data);
        }
      }

    },
    async sendMessage(state, params) {
      let { data } = await axios.post(settings.api_host + `/chatrooms/chat-message/${params.group_id}`, {
        message: params.message
      }, {
        headers: settings.header_request
      });
      if (data) {
        await this.commit('getChatByGroup', params.group_id);
      }
    },
    async updateGroup(state, params) {
      let { data } = await axios.post(settings.api_host + `/chatrooms/update-group/${params.group_id}`, {
        group_name: params.group_name
      }, {
        headers: settings.header_request
      });
      if (data) {
        await this.commit('getGroups');
      }
    },
    async createGroup(state, params) {
      let { data } = await axios.post(settings.api_host + `/chatrooms/create-group`, {
        group_name: params.group_name
      }, {
        headers: settings.header_request
      });
      if (data) {
        await this.commit('getGroups');
      }
    },
    async getContacts(state) {
      let { data } = await axios.get(settings.api_host + '/chatrooms/contacts', {
        headers: settings.header_request
      });
      if (data.status_code == 200) {
        if (data.data) {
          this.commit('setContacts', data.data);
        }
      }

    },
  }
});

export default chatroomStore;
