import axios from 'axios';

const ads = {
    namespaced: true,
    state: () => ({
        lists: [],
        ads:{}
    }),
    mutations: {
        setLists(state, data) {
            state.lists = data;
        },
        setAds(state,data){
            state.ads=data;
        }
    },
    getters:{
        getDetail:(state)=>(id)=>{
             return state.lists.find(list=>list.id===id);
        }
    },
    actions: {
        getLists({ commit }) {
            let request = axios.get('/profiles/ads');
            request.then((res) => {
                if (res.data.code == 200) {
                    commit('setLists', res.data.data);
                }

            });
        }
    }
}

export default ads;