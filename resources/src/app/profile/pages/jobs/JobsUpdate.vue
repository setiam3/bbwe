<template>
  <div class="animate__animated animate__fadeIn">
    <div class="pt-3 mb-3 d-flex justify-content-between">
      <h5>Update Job</h5>
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
    <FormJobs type="update" :job_detail="job"/>
  </div>
</template>
<script>
import mixins from "./../../mixins";
import { createNamespacedHelpers } from "vuex";
const { mapState, mapActions, mapGetters } = createNamespacedHelpers("jobs");
import FormJobs from "./FormJobs";

export default {
  components: {
    FormJobs,
  },
  data(){
    return{
     
    }
  },
  computed:{
    ...mapState(['job']),
  },
  methods:{

  },
    mounted() {
    if (!this.job.id) {
      this.$router.push("/jobs");
    }
  },
};
</script>