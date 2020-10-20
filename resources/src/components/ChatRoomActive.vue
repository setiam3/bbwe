<template>
  <div class="sidebar-right">
    <div class="adv-container">
      <a href="/chatroom">
        <img class="image" src="/images/ads/ads1.jpeg" alt />
      </a>
    </div>
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
            v-for="(usr,index) in group_available"
            v-bind:key="index"
          >
            <div class="d-flex align-items-center">
              <div>
                <img width="40" class="rounded-circle" :src="usr.group_contact.profile" alt srcset />
              </div>
              <div class="member-name pl-1">
                <span>{{usr.group_contact.name}}</span>
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
import chatroomMixin from "./chatroomMixin";

export default {
  mixins: [chatroomMixin],
  computed: {
    group_available() {
      if (this.group) {
        return this.group.group_member;
      }
      return {};
    }
  },
};
</script>