<template>
  <div class="animate__animated animate__fadeIn">
    <div class="pt-3 mb-3 d-flex justify-content-between">
      <h5>Update Article</h5>
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
    <FormArticles type="update" :detail="article"/>
  </div>
</template>
<script>
import mixins from "./../../mixins";
import { createNamespacedHelpers } from "vuex";
const { mapState, mapActions, mapGetters } = createNamespacedHelpers("articles");
import FormArticles from "./FormArticles";




export default {
  components: {
    FormArticles
  },
  data(){
    return{
     
    }
  },
  computed:{
    ...mapState(['article']),
  },
  methods:{

  },
    mounted() {
    if (!this.article.id) {
      this.$router.push("/articles");
    }
  },
};
</script>