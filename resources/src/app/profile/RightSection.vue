<template>
  <div class="content_profile">
    <div class="profile-page-menu">
      <div :class="{'tools-item':true, active:checkRoute('home')}"><router-link to="/"><img src="/images/icon/post-0.png" alt="" /></router-link></div>
      <div :class="{'tools-item':true, active:checkRoute(['articles'])}"><router-link to="/articles"><img src="/images/icon/post-1.png" alt="" /></router-link></div>
      <div :class="{'tools-item':true, active:checkRoute(['jobs','jobs_create'])}"><router-link to="/jobs"><img src="/images/icon/post-2.png" alt="" /></router-link></div>
      <div :class="{'tools-item':true, active:checkRoute(['contacts','contacts_create'])}"><router-link to="/contacts"><img src="/images/icon/post-3.png" alt="" /></router-link></div>
      <div :class="{'tools-item':true, active:checkRoute(['home3'])}"><router-link to="/"><img src="/images/icon/post-4.png" alt="" /></router-link></div>
      <div :class="{'tools-item':true, active:checkRoute(['home3'])}"><a href="/chatroom"><img src="/images/icon/post-5.png" alt="" /></a></div>
      <div :class="{'tools-item':true, active:checkRoute(['home3'])}"><router-link to="/"><img src="/images/icon/post-6.png" alt="" /></router-link></div>
      <div :class="{'tools-item':true, active:checkRoute(['advertisement'])}"><router-link to="/advertisement"><img src="/images/icon/post-7.png" alt="" /></router-link></div>
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

import Contacts from "./pages/Contacts";
import ContactCreate from "./pages/ContactCreate";

import Advertisement from "./pages/Advertisement";
import Jobs from "./pages/Jobs";
import JobsCreate from "./pages/JobsCreate";

import Articles from './pages/Articles';

const routes = [
  {
    path: "/",
    component: Home,
    name: "home",
  },
  {
    path: "/articles",
    component: Articles,
    name: "articles",
  },
  {
    path: "/contacts",
    component: Contacts,
    name: "contacts",
  },
   {
    path: "/contacts/create",
    component: ContactCreate,
    name: "contacts_create",
  },
  {
    path: "/advertisement",
    component: Advertisement,
    name: "advertisement",
  },
  {
    path: "/jobs",
    component: Jobs,
    name: "jobs",
  },
  {
    path: "/jobs/create",
    component: JobsCreate,
    name: "jobs_create",
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
  methods:{
    checkRoute(route){
      return route.includes(this.$route.name);
    }
  }
};
</script>