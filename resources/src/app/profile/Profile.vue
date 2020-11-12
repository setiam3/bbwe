<template>
  <div>
    <BannerPhoto />
    <div class="container_page">
      <div class="profile_content_container">
        <div class="profile_content_left_section">
          <LeftSection />
        </div>
        <div class="profile_content_right_section">
          <RightSection />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import BannerPhoto from "./BannerPhoto";
import LeftSection from "./LeftSection";
import RightSection from "./RightSection";
import mixins from "./mixins";
import { mapMutations } from "vuex";

export default {
  mixins: [mixins],
  props: ["user_login"],
  components: {
    BannerPhoto,
    LeftSection,
    RightSection,
  },
  methods: {
    ...mapMutations(["setUser"]),
  },
  created() {
    this.setUser(this.user_login);
  },
};
</script>