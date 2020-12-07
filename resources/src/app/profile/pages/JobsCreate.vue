<template>
  <div class="animate__animated animate__fadeIn">
    <div class="pt-3 mb-3 d-flex justify-content-between">
      <h5>Create Job</h5>
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
    <form @submit.prevent="submitForm()" id="formJobs" enctype="multipart/form-data">
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
            src="https://placehold.it/400x200?text=Image Here"
            alt=""
            style="cursor: pointer"
            onclick="document.getElementById('imageThumbnail').click()"
          />
        </div>
        <div class="col-md-12 form-group">
          <label for="">Job Title</label>
          <input type="text" class="form-control" name="job_name" required/>
        </div>
        <div class="col-md-12 form-group">
          <label for="">Job Description</label>
          <textarea rows="3" class="form-control" name="job_description" required></textarea>
        </div>
        <div class="col-md-12 form-group">
          <label for="">Job Requirement</label>
          <textarea rows="3" class="form-control" name="job_requirement" required></textarea>
        </div>
        <div class="col-md-12 form-group mt-3">
          <button class="btn btn-primary">Submit new Job</button>
        </div>
      </div>
    </form>
  </div>
</template>
<script>
import axios from "axios";

export default {
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
      let form = document.getElementById("formJobs");
      let formData = new FormData(form);
      formData.append('_csrf',window.csrf);
      let request = axios.post('/profiles/jobs/create',formData);
    },
  },
};
</script>