<template>
  <div class="chatroom">
    <ChatRoomNavbar />
    <div class="chatroom-main">
      <div class="chatroom-container layout-minimize">
        <ChatRoomLeftbar/>
        <div class="chatroom-content">
         <ChatRoomModalAttach/>
          <ChatRoomContent />
        </div>
        <ChatRoomActive />
      </div>
    </div>
    <ChatRoomFooter />
  </div>
</template>
<script>
import $ from "jquery";
import io from "socket.io-client/dist/socket.io";
import ChatRoomContent from "./ChatRoomContent";
import ChatRoomActive from "./ChatRoomActive";
import ChatRoomNavbar from "./ChatRoomNavbar";
import ChatRoomFooter from "./ChatRoomFooter";
import ChatRoomModalAttach from './ChatRoomModalAttach';
import ChatRoomLeftbar from './ChatRoomLeftbar';
import settings from './../config/settings';
import chatroomStore from "./../stores/chatroomStore";
let socket = io(settings.socket_host);

export default {
  store: chatroomStore,
  components: {
    ChatRoomContent,
    ChatRoomActive,
    ChatRoomNavbar,
    ChatRoomFooter,
    ChatRoomModalAttach,
    ChatRoomLeftbar
  },
  methods: {
    getGroup(){
      this.$store.commit('getGroups');
    },
    showHideMenu() {
      if ($("#toogle-menu").hasClass("minimize")) {
        $(".layout-minimize").addClass("grid-minimize");
        $(".minimize-hide").addClass("display-none");
      } else {
        $(".layout-minimize").removeClass("grid-minimize");
        $(".minimize-hide").removeClass("display-none");
      }
    },
    textWelcome() {
      if ($("#chat-message-container").hasClass("active")) {
        $(".text-welcome").removeClass("active");
      } else {
        $(".text-welcome").addClass("active");
      }
    },
    toogleMenuTop(id) {
      if ($(".toogle-menu-top").hasClass("active")) {
        $(id).addClass("active");
      } else {
        $(id).removeClass("active");
      }
    },
  },
  mounted() {
    let _this = this;
    this.getGroup();
    this.$store.commit('getGroups');
    $("#toogle-menu").click(function () {
      if ($(this).hasClass("minimize")) {
        $(this).removeClass("minimize");
      } else {
        $(this).addClass("minimize");
      }
      _this.showHideMenu();
    });
    $(".toogle-menu-top").click(function () {
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
      } else {
        $(this).addClass("active");
      }
      _this.toogleMenuTop($(this).attr("data-target"));
    });
  },
  created() {
    window.onbeforeunload = () => {
      socket.emit("leave", this.username);
    };

    socket.on("hello", (data) => {
      console.log(data);
      this.messages.push({
        text: data,
      });
    });

    socket.on("typing", (data) => {
      this.typing = data;
    });

    socket.on("stopTyping", () => {
      this.typing = false;
    });

    socket.on("joined", (data) => {
      this.info.push({
        username: data,
        type: "joined",
      });

      setTimeout(() => {
        this.info = [];
      }, 5000);
    });

    socket.on("leave", (data) => {
      this.info.push({
        username: data,
        type: "left",
      });

      setTimeout(() => {
        this.info = [];
      }, 5000);
    });

    socket.on("connections", (data) => {
      this.connections = data;
    });
  },
};
</script>