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
          <a href="#" @click="groupModal()">
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

    <modal name="group_modal">
      <form @submit.prevent="createNewGroup()" class="box-group-modal pt-4 pl-4 pr-4 pb-2">
        <div class="group-modal-body">
          <div class="row d-flex align-items-center">
            <div class="col-md-2">
              <div class="icon-group-container">
                <span class="iconify" data-icon="mdi:archive" data-inline="false"></span>
              </div>
            </div>
            <div class="col-md-10">
              <input type="text" class="form-control" v-model="group_name" />
            </div>
          </div>
          <div class="row pt-3">
            <div class="col-md-12">
              <h5 class="color-white">Member <a @click="showMember()" href="#" class="color-white txt-decor-none btn-add-member"><span class="iconify" data-icon="ant-design:plus-circle-filled" data-inline="false"></span></a></h5>
              <div class="member-group p-1">
                <h6 class="color-white">Contact</h6>
                <ul>
                  <li class="d-flex align-items-center justify-content-between pr-2">
                    <a class="color-white d-flex align-items-center" href="#">
                      <div>
                      <img src="/images/icons-wo-circle.png" alt="">
                    </div>
                    <div class="pl-2">
                      Jola Jola
                    </div>
                    </a>
                    <div>
                       <span class="iconify color-green" data-icon="carbon:dot-mark" data-inline="false"></span>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="group-modal-footer">
          <div class="float-right">
            <button type="button" class="btn btn-light btn-sm" @click="closeGroupModal()">Cancel</button>
            <button class="btn btn_1 btn-sm">Create</button>
          </div>
        </div>
      </form>
    </modal>
  </div>
</template>
<script>
import Vue from "vue";
import chatroomMixin from "./chatroomMixin";
import $ from "jquery";
import { mapMutations } from "vuex";
import vmodal from "vue-js-modal";
Vue.use(vmodal);

export default {
  mixins: [chatroomMixin],
  data() {
    return {
      group_name: "",
    };
  },
  computed: {
    groups() {
      return this.$store.state.groups;
    },
  },
  methods: {
    ...mapMutations(["createGroup","getContacts"]),
    selectGroup(group_id, id) {
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
    groupModal() {
      this.$modal.show("group_modal");
    },
    closeGroupModal() {
      this.$modal.hide("group_modal");
    },
    async createNewGroup() {
      await this.createGroup({ group_name: this.group_name });
      this.closeGroupModal();
      this.group_name="";
    },
    showMember(){
      if($('.member-group').hasClass("active")){
        $('.member-group').removeClass("active");
      }else{
        this.getContacts();
        $('.member-group').addClass("active");
      }
    }
  },
  mounted() {},
};
</script>