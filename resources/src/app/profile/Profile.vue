<template>
  <div>
    <BannerPhoto />
  </div>
</template>
<script>
import BannerPhoto from "./BannerPhoto";
import mixins from "./mixins";
import { mapMutations } from "vuex";

export default {
  mixins: [mixins],
  props: ["user_login"],
  components: {
    BannerPhoto,
  },
  methods: {
    ...mapMutations(["setUser"]),
  },
  created() {
    this.setUser(this.user_login);
  },
};
</script>