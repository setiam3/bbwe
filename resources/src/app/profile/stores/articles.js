import axios from 'axios';

const jobs = {
    namespaced: true,
    state: () => ({
        lists: [],
        article:{}
    }),
    mutations: {
        setLists(state, data) {
            state.lists = data;
        },
        setArticle(state,data){
            state.article=data;
        }
    },
    getters:{
        getDetail:(state)=>(id)=>{
             return state.lists.find(list=>list.id===id);
        }
    },
    actions: {
        getLists({ commit }) {
            let request = axios.get('/profiles/articles');
            request.then((res) => {
                if (res.data.code == 200) {
                    commit('setLists', res.data.data);
                }

            });
        }
    }
}

export default jobs;