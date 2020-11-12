<template>
  <div>
    <div class="box-profile">
      <div class="profile-name text-center">
        <h3>{{ user.name }}</h3>
      </div>
      <div class="profile-body">
        <div>
          <h2>{{ user.profession }}</h2>
          <div class="profile-tools">
            <div class="tools-item"><img src="/images/icon/icon-breifcase.png" alt="" /></div>
            <div class="tools-item"><img src="/images/icon/icon-mailbox.png" alt="" /></div>
            <div class="tools-item"><img src="/images/icon/icon-yourvoicemessage.png" alt="" /></div>
          </div>
        </div>
      </div>
    </div>
    <h2 class="text-center mt-5 mb-5">You may also want to see</h2>
  </div>
</template>

<script>
import mixins from "./mixins";

export default {
  mixins: [mixins],
};
</script>