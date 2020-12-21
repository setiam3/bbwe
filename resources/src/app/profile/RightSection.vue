<template>
  <div class="content_profile">
    <div class="profile-page-menu">
      <div :class="{'tools-item':true, active:checkRoute('home')}"><router-link to="/"><img src="/images/icon/post-0.png" alt="" /></router-link></div>
      <div :class="{'tools-item':true, active:checkRoute(['articles','articles_create','articles_update'])}"><router-link to="/articles"><img src="/images/icon/post-1.png" alt="" /></router-link></div>
      <div :class="{'tools-item':true, active:checkRoute(['jobs','jobs_create','jobs_update'])}"><router-link to="/jobs"><img src="/images/icon/post-2.png" alt="" /></router-link></div>
      <div :class="{'tools-item':true, active:checkRoute(['contacts','contacts_create'])}"><router-link to="/contacts"><img src="/images/icon/post-3.png" alt="" /></router-link></div>
      <div :class="{'tools-item':true, active:checkRoute(['home3'])}"><router-link to="/"><img src="/images/icon/post-4.png" alt="" /></router-link></div>
      <div :class="{'tools-item':true, active:checkRoute(['home3'])}"><a href="/chatroom"><img src="/images/icon/post-5.png" alt="" /></a></div>
      <div :class="{'tools-item':true, active:checkRoute(['advertisement_active'])}"><router-link to="/advertisement/active"><img src="/images/icon/post-6.png" alt="" /></router-link></div>
      <div :class="{'tools-item':true, active:checkRoute(['advertisement','advertisement_create','advertisement_update'])}"><router-link to="/advertisement"><img src="/images/icon/post-7.png" alt="" /></router-link></div>
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

import Contacts from "./pages/contacts/Contacts";
import ContactCreate from "./pages/contacts/ContactCreate";

import Ads from "./pages/advertisement/Ads";
import AdsCreate from "./pages/advertisement/AdsCreate";
import AdsUpdate from "./pages/advertisement/AdsUpdate";
import AdsActive from "./pages/advertisement/AdsActive";


import Jobs from "./pages/jobs/Jobs";
import JobsCreate from "./pages/jobs/JobsCreate";
import JobsUpdate from "./pages/jobs/JobsUpdate";

import Articles from './pages/articles/Articles';
import ArticlesCreate from './pages/articles/ArticlesCreate';
import ArticlesUpdate from './pages/articles/ArticlesUpdate';

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
    path: "/articles/create",
    component: ArticlesCreate,
    name: "articles_create",
  },
  {
    path: "/articles/update",
    component: ArticlesUpdate,
    name: "articles_update",
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
    component: Ads,
    name: "advertisement",
  },
   {
    path: "/advertisement/create",
    component: AdsCreate,
    name: "advertisement_create",
  },
  {
    path: "/advertisement/update",
    component: AdsUpdate,
    name: "advertisement_update",
  },
  {
    path: "/advertisement/active",
    component: AdsActive,
    name: "advertisement_active",
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
  {
    path: "/jobs/update",
    component: JobsUpdate,
    name: "jobs_update",
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