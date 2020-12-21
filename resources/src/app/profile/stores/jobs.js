import axios from 'axios';

const jobs = {
    namespaced: true,
    state: () => ({
        lists: [],
        job:{}
    }),
    mutations: {
        setLists(state, data) {
            state.lists = data;
        },
        setJob(state,data){
            state.job=data;
        }
    },
    getters:{
        getDetail:(state)=>(id)=>{
             return state.lists.find(list=>list.id===id);
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