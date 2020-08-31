<template>
  <div class="sidebar-right">
    <div class="adv-container"></div>
    <div class="container-my">
      <div class="member-available">
        <span class="available-text">Available</span>
        <a href="#">
          <span class="iconify" data-icon="ant-design:plus-circle-filled" data-inline="false"></span>
        </a>
      </div>

      <div class="member animate__animated animate__fadeIn" v-if="group_active">
        <ul>
          <li
            class="d-flex align-items-center justify-content-between"
            v-for="(user,index) in group_available"
            v-bind:key="index"
          >
            <div class="d-flex align-items-center">
              <div>
                <img width="50" :src="user.profile" alt srcset />
              </div>
              <div class="member-name">
                <span>{{user.name}}</span>
              </div>
            </div>
            <div>
              <span class="iconify color-green" data-icon="carbon:dot-mark" data-inline="false"></span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
<script>
import chatroomStore from "./../stores/chatroomStore";

export default {
  store: chatroomStore,
  computed: {
    group_selected() {
      return this.$store.state.group_selected;
    },
    group_available() {
      if (this.group_selected) {
        return this.group_selected.user_active;
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
};
</script>