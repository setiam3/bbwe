<template>
  <div class="animate__animated animate__fadeIn">
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
                :src="`/${data_list.ads_image}`"
                alt=""
              />
            </div>
            <div class="w-75- pl-3">
              <h6 class="p-0 m-0">
               Name :  <b>{{ data_list.ads_name }}</b>
              </h6>
              <h6 class="p-0 m-0">
                Description: {{ data_list.ads_description }}
              </h6>
               <h6 class="p-0 m-0">
                Status: {{ data_list.ads_is_active==1?'Active':'NonActive' }}
              </h6>
            </div>
          </div>
          <div>
            <i
              @click="update(data_list.id)"
              style="cursor: pointer"
            >
              <span
                style="color: #e91e63; font-size: 20px"
                class="iconify"
                data-icon="bi:pencil"
                data-inline="false"
              ></span>
            </i>
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
import mixins from "./../../mixins";
import axios from "axios";
import Swal from "sweetalert2";
import { createNamespacedHelpers } from "vuex";
const {
  mapState,
  mapActions,
  mapGetters,
  mapMutations,
} = createNamespacedHelpers("ads");

export default {
  mixins: mixins,
  props: ["lists"],
  computed:{
    ...mapGetters(['getDetail']),
    ...mapState(['ads'])
  },
  methods: {
    ...mapMutations(["setAds"]),
    ...mapActions(['getLists']),
    update(id) {
      this.setAds(this.getDetail(id));
      if(this.ads){
        this.$router.push(`/advertisement/update`);
      }
    },
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
          let request = axios.post(`/profiles/ads/delete`, formData);
          request.then((res) => {
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
            _this.getLists();
          });
        }
      });
    },
  },
};
</script>