<template>
  <div>
    <form
      @submit.prevent="submitForm()"
      id="formJobs"
      enctype="multipart/form-data"
    >
      <div class="row">
        <div class="col-md-6 form-group">
          <label for="">Image</label>
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
            :src="job_detail.thumbnail?`/${job_detail.thumbnail}`:'https://placehold.it/400x200?text=Image Here'"
            alt=""
            style="cursor: pointer"
            onclick="document.getElementById('imageThumbnail').click()"
          />
        </div>
        <div class="col-md-12 form-group">
          <label for="">Job Title</label>
          <input type="text" class="form-control" name="job_name" required v-model="job_detail.job_name"/>
        </div>
        <div class="col-md-12 form-group">
          <label for="">Job Description</label>
          <textarea
            rows="3"
            class="form-control"
            name="job_description"
            v-model="job_detail.job_description"
            required
          ></textarea>
        </div>
        <div class="col-md-12 form-group">
          <label for="">Job Requirement</label>
          <textarea
            rows="3"
            class="form-control"
            name="job_requirement"
            v-model="job_detail.job_requirement"
            required
          ></textarea>
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

export default {
  props: ["type", "job_detail"],
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
      if(this.job_detail.id){
        formData.append("id", this.job_detail.id);
      }
      let request = axios.post("/profiles/jobs/create", formData);
      request.then((res) => {
        _this.$router.push("/jobs");
      });
    },
  }
};
</script>
  
  