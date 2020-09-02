<template>
  <div class="sidebar-left">
    <div class="container-my">
      <div>
        <a id="toogle-menu" class="menu-toogle" href="#">
          <span class="iconify" data-icon="gg:menu-left-alt" data-inline="false"></span>
        </a>
      </div>
      <div class="search">
        <input class="form-control" placeholder="Search term" />
        <span class="iconify" data-icon="bx:bx-search" data-inline="false"></span>
      </div>
    </div>
    <div class="group">
      <div class="container-my minimize-hide">
        <div class="d-flex align-items-center justify-content-between group-title-container">
          <span class="group-title">Group</span>
          <a href="#">
            <span class="iconify" data-icon="ant-design:plus-circle-filled" data-inline="false"></span>
          </a>
        </div>
      </div>
      <div class="container-my-r">
        <ul>
          <li
            class="list-item-group"
            v-for="(group,index) in groups"
            v-bind:key="index"
            :id="'item-group-'+group.group_id"
          >
            <a href="#" @click="selectGroup(group.group_id,'item-group-'+group.group_id)">
              <span class="iconify" data-icon="mdi:archive" data-inline="false"></span>
              <span class="text-group minimize-hide">{{group.group_name}}</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
<script>
import chatroomStore from "./../stores/chatroomStore";
import $ from "jquery";

export default {
  store: chatroomStore,
  computed: {
    groups() {
      return this.$store.state.groups;
    },
  },
  methods: {
    selectGroup(group_id, id) {

      let data = this.groups.filter(function (item) {
        return item.group_id == group_id;
      });

      if ($("#" + id).hasClass("active")) {
        this.$store.commit("setGroup", {});
        this.$store.commit("setAttachActive", "");
        $("#" + id).removeClass("active");
      } else {
         $(".list-item-group").removeClass("active");
        this.$store.commit("getChatByGroup", group_id);
        $("#" + id).addClass("active");
      }
    },
  },
  mounted() {},
};
</script>