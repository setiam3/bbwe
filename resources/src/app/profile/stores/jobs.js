import axios from 'axios';

const jobs = {
    namespaced: true,
    state: () => ({
        lists: []
    }),
    mutations: {
        setLists(state, data) {
            state.lists = data;
        }
    },
    actions: {
        getLists({ commit }) {
            let request = axios.get('/profiles/jobs');
            request.then((res) => {
                if (res.data.code == 200) {
                    commit('setLists', res.data.data);
                }

            });
        }
    }
}

export default jobs;