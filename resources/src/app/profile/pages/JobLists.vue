<template>
  <div class="animate__animated animate__fadeIn">
    <div class="pt-3 mb-3 d-flex justify-content-between">
      <h5>Jobs</h5>
      <router-link to="/jobs"
        ><span
          class="iconify"
          data-icon="bi:arrow-left"
          data-inline="false"
        ></span>
        Back</router-link
      >
    </div>
    <br />
    <div>
      <ul class="p-0 m-0">
        <li
          class="d-flex justify-content-between contact_list mb-4 p-2"
          style="list-style: none"
          v-for="data_list in lists"
          v-bind:key="data_list.id"
        >
          <div class="d-flex">
            <div class="w-25-">
              <img
              width="150"
                class="img-fluid"
                :src="`/${data_list.thumbnail}`"
                alt=""
              />
            </div>
            <div class="w-75- pl-3">
              <h6 class="p-0 m-0">
                <b>{{ data_list.job_name }}</b>
              </h6>
              <h6 class="p-0 m-0">{{ data_list.job_description }}</h6>
              <h6>
                Requirement: {{ data_list.job_requirement }}
              </h6>
            </div>
          </div>
          <div>
            <i @click="removeContact(data_list.id)" style="cursor: pointer">
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

export default {
  mixins: mixins,
  props: ["lists"],
  methods: {
    // removeContact(id) {
    //   let _this = this;
    //   Swal.fire({
    //     title: "Are you sure?",
    //     text: "You won't be able to revert this!",
    //     icon: "warning",
    //     showCancelButton: true,
    //     confirmButtonColor: "#3085d6",
    //     cancelButtonColor: "#d33",
    //     confirmButtonText: "Yes, delete it!",
    //   }).then((result) => {
    //     if (result.isConfirmed) {
    //       let formData = new FormData();
    //       formData.append("_csrf", window.csrf);
    //       formData.append("id", id);
    //       let request = axios.post(`/profile/delete-data_list`, formData);
    //       request.then((res) => {
    //         Swal.fire("Deleted!", "Your file has been deleted.", "success");
    //       });
    //     }
    //   });
    // },
  },
};
</script>