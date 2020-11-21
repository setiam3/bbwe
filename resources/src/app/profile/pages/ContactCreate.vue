<template>
  <div>
    <div class="pt-3 mb-3 d-flex justify-content-between">
      <h5>Add new contact</h5>
      <router-link to="/contacts"
        ><span
          class="iconify"
          data-icon="bi:arrow-left"
          data-inline="false"
        ></span>
        Back</router-link
      >
    </div>
    <div class="row">
      <div class="col-md-12">
        <ul class="p-0">
          <li
            v-for="member in members.filter((val)=>val.id !== user.id)"
            v-bind:key="member.id"
            style="list-style: none"
            class="p-0 m-0 d-flex align-items-center mb-3"
          >
            <input
              :checked="contact_lists.some((val) => member.id == val.member.id)"
              type="checkbox"
              :value="member.id"
              class="mr-2"
              @click="checkContact($event)"
            />
            <div class="d-flex align-items-center">
              <img
                width="60"
                :src="`/${member.photo}`"
                alt=""
                class="rounded-circle mr-2"
              />
              <div>
                {{ member.name }} ( {{ member.email }})
                <p>
                  <b>{{ member.profession }}</b>
                </p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-dark" @click="addContact()">Add Contact</button>
      </div>
    </div>
  </div>
</template>
<script>
import mixins from "./../mixins";
import { mapState, mapActions } from "vuex";
import axios from "axios";

export default {
  mixins: mixins,
  data() {
    return {
      members_id: [],
    };
  },
  computed: {
    ...mapState({
      user:(state)=>state.user,
      members: (state) => state.members,
      contact_lists: (state) => state.contact.contact_lists,
    }),
  },
  methods: {
    ...mapActions(["getMembers"]),
    ...mapActions("contact", ["getContactList"]),
    checkContact(e) {
      let value = e.target.value;
      let checked = e.target.checked;
      if (checked == true) {
        this.members_id.push(value);
      } else {
        let index = this.members_id.indexOf(value);
        this.members_id.splice(index, 1);
      }
    },
    addContact() {
      var _this = this;
      let formData = new FormData();
      formData.append("_csrf", window.csrf);
      
      for (let index = 0; index < this.members_id.length; index++) {
        const element = this.members_id[index];
        formData.append("members_id[]",element);
      }
      let request = axios.post("/profile/add-contact", formData);
      request.then((res) => {
        _this.$router.push("/contacts");
      });
    },
  },
  mounted() {
    this.getMembers();
    this.getContactList();
  },
};
</script>