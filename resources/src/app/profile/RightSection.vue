<template>
  <div class="content_profile">
    <div class="profile-page-menu">
      <div class="tools-item"><img src="/images/icon/post-0.png" alt="" /></div>
      <div class="tools-item"><img src="/images/icon/post-1.png" alt="" /></div>
      <div class="tools-item"><img src="/images/icon/post-2.png" alt="" /></div>
      <div class="tools-item"><img src="/images/icon/post-3.png" alt="" /></div>
      <div class="tools-item"><img src="/images/icon/post-4.png" alt="" /></div>
      <div class="tools-item"><img src="/images/icon/post-5.png" alt="" /></div>
      <div class="tools-item"><img src="/images/icon/post-6.png" alt="" /></div>
      <div class="tools-item"><img src="/images/icon/post-7.png" alt="" /></div>
    </div>
    <div class="content-profile-body">
      <router-view></router-view>
    </div>
  </div>
</template>
<script>
import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);
import Home from "./pages/Home";

const routes = [
  {
    path: "/",
    component: Home,
    name: "home",
  },
];

const router = new VueRouter({
  routes,
});

export default {
  router,
  data() {
    return {};
  },
};
</script>