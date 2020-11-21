import stores from './stores/stores';
import { mapState } from 'vuex';

const mixins = {
    store: stores,
    computed: {
        ...mapState(['user'])
    },
    
}

export default mixins;