<template>
  <div class="animate__animated animate__fadeIn">
    <div class="pt-3 mb-3 d-flex justify-content-between">
      <h5>Create Advertisement</h5>
      <router-link to="/advertisement"
        ><span
          class="iconify"
          data-icon="bi:arrow-left"
          data-inline="false"
        ></span>
        Back</router-link
      >
    </div>
    <br />
    <FormAds type="create" :detail="{}"/>
  </div>
</template>
<script>
import FormAds from "./FormAds";

export default {
  components: {
    FormAds,
  },
};
</script>