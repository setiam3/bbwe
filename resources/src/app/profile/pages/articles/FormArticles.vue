<template>
  <div>
    <form
      @submit.prevent="submitForm()"
      id="formJobs"
      enctype="multipart/form-data"
    >
      <div class="row">
        <div class="col-md-6 form-group">
          <label for="">Banner</label>
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
              detail.thumbnail
                ? `/${detail.thumbnail}`
                : 'https://placehold.it/450x250?text=Banner Here'
            "
            alt=""
            style="cursor: pointer"
            onclick="document.getElementById('imageThumbnail').click()"
          />
        </div>
        <div class="col-md-12 form-group">
          <label for="">Title</label>
          <input
            type="text"
            class="form-control"
            name="article_title"
            required
            v-model="detail.article_title"
          />
        </div>
        <div class="col-md-12 form-group">
          <label for="">Content</label>
          <vue-editor v-model="detail.content_article"/>
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
const { mapState, mapActions, mapGetters } = createNamespacedHelpers("jobs");
// Advanced Use - Hook into Quill's API for Custom Functionality
import { VueEditor, Quill } from "vue2-editor";

export default {
  props: ["type", "detail"],
  components: {
    VueEditor,
  },
  computed: {
    ...mapState(["job"]),
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
      let form = document.getElementById("formJobs");
      let formData = new FormData(form);
      formData.append("_csrf", window.csrf);
      if (this.detail.id) {
        formData.append("id", this.detail.id);
      }
      formData.append("content_article", this.detail.content_article);
      let request = axios.post("/profiles/articles/create", formData);
      request.then((res) => {
        _this.$router.push("/articles");
      });
    },
  },
};
</script>
  
  