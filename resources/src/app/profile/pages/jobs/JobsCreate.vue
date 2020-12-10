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
    <FormJobs type="create" :job_detail="{}"/>
  </div>
</template>
<script>
import FormJobs from "./FormJobs";

export default {
  components: {
    FormJobs,
  },
};
</script>