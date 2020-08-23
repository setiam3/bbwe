<template>
  <div>
    <div
      :class="'popup-attach-container animate__animated animate__fadeInUp '+classRecorderAttach"
      v-if="attach_active"
    >
      <div class="tools-recorder" v-if="classRecorderAttach=='recorder'">
        <div class="circle">
          <div :class="'circle2 '+classRecordStatus">
            <a href="#" class="record-link" @click="record()">
              <span class="iconify" data-icon="ic:sharp-keyboard-voice" data-inline="false"></span>
            </a>
          </div>
        </div>
      </div>
      <div class="text-recorder animate__animated animate__fadeIn" v-if="classRecorderAttach=='recorder' && classRecordStatus=='stop-attach'">
        <div class="d-flex align-items-center">
          <input type="text" class="form-control" placeholder="Type Message" />
          <div class="btn-send-container">
            <a class="btn-send" href="#">
              <span class="iconify" data-icon="ic:baseline-send" data-inline="false"></span>
            </a>
          </div>
        </div>
        <div class="btn-close-container">
          <a href="#" class="btn-close">
            <span class="iconify" data-icon="jam:close" data-inline="false"></span>
          </a>
        </div>
      </div>
      <div class="popup-attach" v-if="classRecorderAttach=='attach'">
        <div class="item">
          <a href="#">
            <img src="/images/chatroom-icon-map.png" alt />
            <p>Location</p>
          </a>
        </div>
        <div class="item">
          <a href="#">
            <img src="/images/chatroom-icon-gallery.png" alt />
            <p>Gallery</p>
          </a>
        </div>
        <div class="item">
          <a href="#">
            <img src="/images/chatroom-icon-camera.png" alt />
            <p>Photos</p>
          </a>
        </div>
        <div class="item">
          <a href="#">
            <img src="/images/chatroom-icon-email.png" alt />
            <p>Contact</p>
          </a>
        </div>
        <div class="item">
          <a href="#">
            <img src="/images/chatroom-icon-music.png" alt />
            <p>Music</p>
          </a>
        </div>
        <div class="item">
          <a href="#">
            <img src="/images/chatroom-icon-document.png" alt />
            <p>Document</p>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import chatroomStore from "./../stores/chatroomStore";

export default {
  store: chatroomStore,
  computed: {
    attach_active() {
      return this.$store.state.attach_active;
    },
    classRecorderAttach() {
      if (this.$store.state.attach_active == "recorder") {
        return "recorder";
      }
      if (this.$store.state.attach_active == "attach") {
        return "attach";
      }
      return "";
    },
    classRecordStatus() {
      if (this.$store.state.attach_record_status == "run") {
        return "active-record";
      }
      if (this.$store.state.attach_record_status == "stop") {
        return "stop-attach";
      }
      return "";
    },
  },
  methods: {
    record() {
      if (
        this.$store.state.attach_record_status == "stop" ||
        this.$store.state.attach_record_status == ""
      ) {
        this.$store.commit("setRecordStatus", "run");
      } else {
        this.$store.commit("setRecordStatus", "stop");
      }
    },
  },
};
</script>