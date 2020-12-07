<template>
  <div class="contacts animate__animated animate__fadeIn">
    <div class="adv" v-if="contact_lists.length <= 0">
      <h1 class="text-not-have-adv">You Don't have contacts <br /></h1>
      <router-link class="btn btn-adv mt-4" to="/contacts/create"
        >Create Contact</router-link
      >
    </div>
    <div v-else>
      <ContactLists :contacts="contact_lists"/>
    </div>
    <div class="d-flex-justify-content-center" v-if="contact_lists.length>0">
      <router-link class="btn btn-dark mt-1" to="/contacts/create"
        >Add new Contact</router-link
      >
    </div>
  </div>
</template>
<script>
import mixins from "./../mixins";
import { createNamespacedHelpers } from "vuex";
const { mapState, mapActions } = createNamespacedHelpers("contact");
import ContactLists from "./ContactLists";

export default {
  mixins: mixins,
  components: {
    ContactLists,
  },
  computed: {
    ...mapState({
      contact_lists: (state) => state.contact_lists,
    }),
  },
  methods: {
    ...mapActions(["getContactList"]),
  },
  mounted() {
    this.getContactList();
  },
};
</script>