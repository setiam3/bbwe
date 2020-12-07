<template>
  <div class="animate__animated animate__fadeIn">
    <div class="pt-3 mb-3 d-flex justify-content-between">
      <h5>Contacts</h5>
    </div>
    <div>
      <ul class="p-0 m-0">
        <li
          class="d-flex justify-content-between contact_list mb-4 p-2"
          style="list-style: none"
          v-for="contact in contacts"
          v-bind:key="contact.id"
        >
          <div class="d-flex">
            <div class="w-25-">
              <img
                class="rounded-circle"
                :src="`/${contact.member.photo}`"
                alt=""
              />
            </div>
            <div class="w-75- pl-3">
              <h6 class="p-0 m-0">
                <b>{{ contact.member.name }} ({{ contact.member.email }})</b>
              </h6>
              <h6 class="p-0 m-0">{{ contact.member.profession }}</h6>
              <h6>
                Skill: <b>{{ contact.member.skill }}</b>
              </h6>
            </div>
          </div>
          <div>
            <i @click="removeContact(contact.id)" style="cursor: pointer">
              <span
                style="color: #e91e63; font-size: 20px"
                class="iconify"
                data-icon="bi:trash"
                data-inline="false"
              ></span>
            </i>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>
<script>
import mixins from "./../mixins";
import axios from "axios";
import Swal from "sweetalert2";
import { mapState, mapActions } from "vuex";

export default {
  mixins: mixins,
  props: ["contacts"],
  methods: {
    ...mapActions("contact", ["getContactList"]),
    removeContact(id) {
      let _this = this;
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          let formData = new FormData();
          formData.append("_csrf", window.csrf);
          formData.append("id", id);
          let request = axios.post(`/profile/delete-contact`, formData);
          request.then((res) => {
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
            _this.getContactList();
          });
        }
      });
    },
  },
};
</script>