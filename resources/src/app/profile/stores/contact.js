import axios from 'axios';

const contact = {
    namespaced: true,
    state: () => ({
        contact_lists: [],
        members:[]
    }),
    mutations: {
        setConcatList(state, data) {
            state.contact_lists = data;
        },
        setMembers(state, data) {
            state.members = data;
        }
    },
    actions: {
        getContactList({ commit }) {
            let request = axios.get('/profiles/contacts');
            request.then((res) => {
                commit('setConcatList', res.data);
            });
        },
        getMembers({ commit }) {
            let request = axios.get('/profiles/contacts/members');
            request.then((res) => {
                commit('setMembers', res.data);
            });
        },
    }
}

export default contact;