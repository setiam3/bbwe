<template>
  <div class="chatroom-nav-container">
    <div class="chatroom-nav">
      <div class="nav-left container-my">
        <div class="logo">
          <a href="/chatroom">
            <img src="/images/chatroom_logo_crop.png" alt srcset />
          </a>
        </div>
      </div>
      <div class="nav-center d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <div class="icon-wo" v-if="group_active">
            <img src="/images/icons-wo-circle.png" alt srcset />
          </div>
          <h4
            id="groupName"
            v-if="group_active"
            contenteditable="true"
            @blur="updateGroupName()"
          >{{ group.group_name }}</h4>
        </div>
        <div class="d-flex search-container">
          <div class="search">
            <input class="form-control" />
            <span class="iconify" data-icon="bx:bx-search" data-inline="false"></span>
          </div>
          <div>
            <a href="#" class="toogle-menu-top" data-target="#dropdown1">
              <span class="iconify" data-icon="carbon:overflow-menu-vertical" data-inline="false"></span>
            </a>
          </div>
          <div id="dropdown1" class="box-dropdown-menu"></div>
        </div>
      </div>
      <div class="nav-right">
        <div class="d-flex justify-content-between">
          <div class="d-flex align-items-center">
            <div class="icon-wo">
              <img :src="user.photo" alt srcset />
            </div>
            <div>
              <h5 class="m-0 p-0">{{ user.name }}</h5>
              <small>
                <span class="iconify color-green" data-icon="carbon:dot-mark" data-inline="false"></span>
                Active Now
                <span
                  style="font-size: 1rem;"
                  class="iconify"
                  data-icon="bi:bell-fill"
                  data-inline="false"
                ></span>
              </small>
            </div>
          </div>
          <div class="pl-5">
            <a class="dropdown-menu-right" href="#" @click="showLogout()">
              <span class="iconify" data-icon="ant-design:caret-down-filled" data-inline="false"></span>
            </a>
          </div>
          <div class="box-dropdown-logout">
            <div>
              <a
                href="#"
                onclick="event.preventDefault(); document.getElementById('logoutForm').submit()"
              >
                Logout
                <span
                  class="iconify"
                  data-icon="heroicons-outline:logout"
                  data-inline="false"
                ></span>
              </a>
              <form action="/site/logout" id="logoutForm" method="POST">
                <input type="hidden" name="_csrf" :value="token" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import chatroomMixin from "./chatroomMixin";
import $ from "jquery";
import { mapMutations } from "vuex";

export default {
  mixins: [chatroomMixin],
  computed: {
    token() {
      return $('meta[name="csrf-token"]').attr("content");
    },
  },
  methods: {
    ...mapMutations(["updateGroup"]),
    showLogout() {
      if ($(".box-dropdown-logout").hasClass("active")) {
        $(".box-dropdown-logout").removeClass("active");
      } else {
        $(".box-dropdown-logout").addClass("active");
      }
    },
    async updateGroupName() {
      let groupName = $("#groupName").text();
      let params={
        group_id:this.group.group_id,
        group_name:groupName
      };
      await this.updateGroup(params);
    },
  },
  mounted() {},
};
</script>
