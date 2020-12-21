<template>
  <div class="animate__animated animate__fadeIn">
    <div class="pt-3 mb-3 d-flex justify-content-between">
      <h5>Update Job</h5>
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
    <FormAds type="update" :detail="ads"/>
  </div>
</template>
<script>
import mixins from "./../../mixins";
import { createNamespacedHelpers } from "vuex";
const { mapState, mapActions, mapGetters } = createNamespacedHelpers("ads");
import FormAds from "./FormAds";

export default {
  components: {
    FormAds,
  },
  data(){
    return{
     
    }
  },
  computed:{
    ...mapState(['ads']),
  },
  methods:{

  },
    mounted() {
    if (!this.ads.id) {
      this.$router.push("/advertisement");
    }
  },
};
</script>