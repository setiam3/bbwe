import chatroomStore from "./../stores/chatroomStore";

var chatroomMixin = {
    store: chatroomStore,
    computed: {
        user() {
            return window.user;
        },
        group() {
            return this.$store.state.group_selected;
        },
        groups() {
            return this.$store.state.groups;
        },
        group_active() {
            if (
                Object.keys(this.$store.state.group_selected).length === 0 &&
                this.$store.state.group_selected.constructor === Object
            ) {
                return false;
            }
            return true;
        },
    }
}

export default chatroomMixin;