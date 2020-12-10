<template>
  <div class="animate__animated animate__fadeIn">
    <div class="pt-3 mb-3 d-flex justify-content-between" v-if="lists.length > 0">
      <h5>Jobs</h5>
    </div>
    <div class="adv" v-if="lists.length <= 0">
      <h1 class="text-not-have-adv">You Don't have Jobs<br /></h1>
      <router-link class="btn btn-adv mt-4" to="/jobs/create"
        >Create a Job</router-link
      >
    </div>
    <div v-else>
      <JobLists :lists="lists" />
    </div>
    <div class="d-flex-justify-content-center" v-if="lists.length > 0">
      <router-link class="btn btn-dark mt-1" to="/jobs/create"
        >Add new Job</router-link
      >
    </div>
  </div>
</template>

<script>
import mixins from "./../../mixins";
import { createNamespacedHelpers } from "vuex";
const { mapState, mapActions } = createNamespacedHelpers("jobs");
import JobLists from "./JobLists";

export default {
  mixins: mixins,
  components: {
    JobLists,
  },
  computed: {
    ...mapState({
      lists: (state) => state.lists,
    }),
  },
  methods: {
    ...mapActions(["getLists"]),
  },
  mounted() {
    this.getLists();
  },
};
</script>