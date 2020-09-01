<template>
  <div class="chatroom-content" id="chatroom-content">
    <div class="text-welcome" v-if="!group_active">
      <h3>
        You have not join any group
        <br />Join Now
      </h3>
    </div>
    <div
      id="chat-message-container"
      class="chat-message-container animate__animated animate__fadeIn"
      v-if="group_active"
    >
      <div class="chat-message" v-for="(message,index) in group_messages" v-bind:key="index">
        <div class="chat-message-profile">
          <img :src="message.created.profile" alt srcset />
        </div>
        <div class="chat-message-box">
          <div class="chat-message-text">
            <p>{{message.message}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import chatroomStore from "./../stores/chatroomStore";
import { mapState } from "vuex";


export default {
  store: chatroomStore,
  computed: {
    ...mapState(["group_selected"]),
    group_messages() {
      if (this.group_selected) {
        return this.group_selected.messages;
      }
      return {};
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
  },
  watch: {
    group_selected(val) {
    
    },
  },
};
</script>