import axios from 'axios';

const contact = {
    namespaced: true,
    state: () => ({
        contact_lists: []
    }),
    mutations: {
        setConcatList(state, data) {
            state.contact_lists = data;
        }
    },
    actions: {
        getContactList({ commit }) {
            let request = axios.get('/profile/contact-list');
            request.then((res) => {
                commit('setConcatList', res.data);
            });
        }
    }
}

export default contact;