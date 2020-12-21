<template>
  <div class="animate__animated animate__fadeIn">
    <div class="pt-3 mb-3 d-flex justify-content-between">
      <h5>Advertisement Active</h5>
    </div>
    <div class="d-flex">
      <div class="form-group">
        <img
          id="imagePreview"
          class="img-fluid rounded"
          width="300"
          :src="
            ads.ads_image
              ? `/${ads.ads_image}`
              : 'https://placehold.it/400x200?text=Image or GIF Here'
          "
          alt=""
        />
      </div>
      <div class="form-group ml-2">
          <h4>{{ads.ads_name}}</h4>
          <p>{{ads.ads_description}}</p>
      </div>
    </div>
  </div>
</template>

<script>
import mixins from "./../../mixins";
import { createNamespacedHelpers } from "vuex";
const { mapState, mapActions, mapMutations } = createNamespacedHelpers("ads");
import axios from "axios";

export default {
  mixins: mixins,
  components: {},
  computed: {
    ...mapState({
      ads: (state) => state.ads,
    }),
  },
  methods: {
    ...mapMutations(["setAds"]),
  },
  mounted() {
    let _this = this;
    let request = axios.get("/profiles/ads/active");
    request.then((res) => {
      if (res.data.code == 200) {
        _this.setAds(res.data.data);
      }
    });
  },
};
</script>