<template>
  <div>
    <form
      @submit.prevent="submitForm()"
      id="formAds"
      enctype="multipart/form-data"
    >
      <div class="row">
        <div class="col-md-6 form-group">
          <label for="">Advertisement</label>
          <input
            type="file"
            name="UploadImageJobForm[imageFile]"
            style="display: none"
            id="imageThumbnail"
            @change="changeImage($event)"
          />
          <img
            id="imagePreview"
            class="img-fluid rounded"
            :src="
              detail.ads_image
                ? `/${detail.ads_image}`
                : 'https://placehold.it/400x200?text=Image or GIF Here'
            "
            alt=""
            style="cursor: pointer"
            onclick="document.getElementById('imageThumbnail').click()"
          />
        </div>
        <div class="col-md-12 form-group">
          <label for="">Advertisement Name</label>
          <input
            type="text"
            class="form-control"
            name="ads_name"
            required
            v-model="detail.ads_name"
          />
        </div>
        <div class="col-md-12 form-group">
          <label for="">Description</label>
          <textarea
            rows="3"
            class="form-control"
            name="ads_description"
            v-model="detail.ads_description"
            required
          ></textarea>
        </div>
        <div class="form-group col-md-12">
          <div class="custom-control custom-switch">
            <input
              type="checkbox"
              class="custom-control-input"
              id="customSwitch1"
              v-model="detail.ads_is_active"
              name="ads_is_active"
              value="1"
            />
            <label class="custom-control-label" for="customSwitch1"
              >Is Active</label
            >
          </div>
        </div>
        <div class="col-md-12 form-group mt-3">
          <button class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import mixins from "./../../mixins";
import { createNamespacedHelpers } from "vuex";
const { mapState, mapActions, mapGetters } = createNamespacedHelpers("ads");

export default {
  props: ["type", "detail"],
  computed: {
    ...mapState(["ads"]),
  },
  methods: {
    changeImage(e) {
      let reader = new FileReader();
      let file = e.target.files[0];

      reader.addEventListener("load", function () {
        document.getElementById("imagePreview").src = reader.result;
      });

      if (file) {
        reader.readAsDataURL(file);
      }
    },
    submitForm() {
      let _this = this;
      let form = document.getElementById("formAds");
      let formData = new FormData(form);
      formData.append("_csrf", window.csrf);
      if (this.detail.id) {
        formData.append("id", this.detail.id);
      }
      let request = axios.post("/profiles/ads/create", formData);
      request.then((res) => {
        _this.$router.push("/advertisement");
      });
    },
  },
};
</script>
  
  