<template>
  <div class="animate__animated animate__fadeIn">
    <div class="pt-3 mb-3 d-flex justify-content-between">
      <h5>Create Article</h5>
      <router-link to="/articles"
        ><span
          class="iconify"
          data-icon="bi:arrow-left"
          data-inline="false"
        ></span>
        Back</router-link
      >
    </div>
    <br />
    <FormArticles type="create" :detail="{}"/>
  </div>
</template>
<script>
import FormArticles from "./FormArticles";

export default {
  components: {
    FormArticles,
  },
};
</script>