<template>
  <div class="chatroom">
    <ChatRoomNavbar />
    <div class="chatroom-main">
      <div class="chatroom-container layout-minimize">
        <ChatRoomLeftbar />
        <div class="chatroom-content">
          <ChatRoomModalAttach />
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
import ChatRoomModalAttach from "./ChatRoomModalAttach";
import ChatRoomLeftbar from "./ChatRoomLeftbar";
import settings from "./../config/settings";
import chatroomMixin from "./chatroomMixin";
let socket = io(settings.socket_host);
import { mapState, mapMutations } from "vuex";
import "howler";

export default {
  mixins: [chatroomMixin],
  components: {
    ChatRoomContent,
    ChatRoomActive,
    ChatRoomNavbar,
    ChatRoomFooter,
    ChatRoomModalAttach,
    ChatRoomLeftbar,
  },
  computed: {
    ...mapState(["groups", "group_selected"]),
  },
  watch: {
    groups(val) {
      let _this = this;
      this.groups.forEach(function (group) {
        socket.on(group.group_id, async (data) => {
          if (data.type == "message") {
            await _this.setGroup(group.group_id);

            if (data.user_id) {
              if (data.user_id !== window.user.user_id) {
                _this.notif();
                $(".list-item-group").removeClass("active");
                $("#item-group-" + group.group_id).addClass('active');
              }
            }
          }
        });
      });
    },
    group_selected(val) {},
  },
  methods: {
    ...mapMutations(["getChatByGroup"]),
    getGroup() {
      this.$store.commit("getGroups");
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
    async setGroup(group_id) {
      await this.getChatByGroup(group_id);
    },
    notif() {
      let sound = new Howl({
        src: "/audio/notif.mp3",
      });
      sound.play();
    },
    selectGroup(id) {
      if ($("#" + id).hasClass("active")) {
        $("#" + id).removeClass("active");
      } else {
        $(".list-item-group").removeClass("active");
        $("#" + id).addClass("active");
      }
    },
  },
  mounted() {
    let _this = this;
    this.getGroup();
    this.$store.commit("getGroups");
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
    });

    socket.on("typing", (data) => {
      this.typing = data;
    });

    socket.on("stopTyping", () => {
      this.typing = false;
    });

    socket.on("joined", (data) => {
      // this.info.push({
      //   username: data,
      //   type: "joined",
      // });
      // setTimeout(() => {
      //   this.info = [];
      // }, 5000);
    });

    socket.on("leave", (data) => {
      // this.info.push({
      //   username: data,
      //   type: "left",
      // });
      // setTimeout(() => {
      //   this.info = [];
      // }, 5000);
    });

    socket.on("connections", (data) => {
      // this.connections = data;
    });
  },
};
</script>