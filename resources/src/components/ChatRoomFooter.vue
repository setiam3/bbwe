<template>
  <div class="chatroom-footer">
    <div class="chatroom-footer-container layout-minimize">
      <div class="footer-left">
        <div class="setting">
          <span class="iconify" data-icon="bx:bx-cog" data-inline="false"></span>
          <span class="minimize-hide">Settings</span>
        </div>
      </div>
      <div class="footer-content" v-if="group_active">
        <div class="chatbox-container">
          <input
            type="text"
            class="chatbox-text"
            placeholder="Type Message"
            v-model="message"
            id="chat-box-input"
            @keyup="onEnterMessage($event)"
          />
        </div>
        <div class="tools">
          <div>
            <a
              href="#"
              id="attach-voice"
              :class="'tools-link '+classRecorder"
              @click="openRecorder()"
            >
              <span class="iconify" data-icon="ic:sharp-keyboard-voice" data-inline="false"></span>
            </a>
          </div>
          <div>
            <a href="#" id="attach-attach" :class="'tools-link '+classAttach" @click="openAttach()">
              <span class="iconify" data-icon="eva:attach-outline" data-inline="false"></span>
            </a>
          </div>
          <div>
            <button class="btn btn_1 btn-sm" @click="sendMessage()">Send</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import chatroomStore from "./../stores/chatroomStore";
import io from "socket.io-client/dist/socket.io";
import settings from "./../config/settings";
let socket = io(settings.socket_host);
import { mapState } from "vuex";
// import $ from "jquery";

export default {
  store: chatroomStore,
  data() {
    return {
      message: "",
    };
  },
  computed: {
    ...mapState(['group_selected']),

    group_active() {
      if (
        Object.keys(this.group_selected).length === 0 &&
        this.group_selected.constructor === Object
      ) {
        return false;
      }
      return true;
    },
    classRecorder() {
      if (this.$store.state.attach_active == "recorder") {
        return "active";
      }
      return "";
    },
    classAttach() {
      if (this.$store.state.attach_active == "attach") {
        return "active";
      }
      return "";
    },
  },
  methods: {
    openRecorder() {
      this.$store.commit("setRecordStatus", "");
      if (this.$store.state.attach_active !== "recorder") {
        this.$store.commit("setAttachActive", "recorder");
      } else {
        this.$store.commit("setAttachActive", "");
      }
    },
    openAttach() {
      this.$store.commit("setRecordStatus", "");
      if (this.$store.state.attach_active !== "attach") {
        this.$store.commit("setAttachActive", "attach");
      } else {
        this.$store.commit("setAttachActive", "");
      }
    },
    async sendMessage() {
      await this.$store.commit("sendMessage", {
        group_id: this.group_selected.group_id,
        message: this.message,
      });
      this.message = "";
      socket.emit(this.group_selected.group_id, {
        type: "message",
        group_id: this.group_selected.group_id,
        user_id:window.user.user_id,
        message: this.message,
      });
    },
    async onEnterMessage(e) {
      if (e.keyCode === 13) {
        await this.sendMessage();
      }
    },
  },
  mounted() {},
};
</script>