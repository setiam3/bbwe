<template>
  <div class="profile_banner_photo_container">
      <img :src="`/${user.photo}`" alt="">
  </div>
</template>
<script>
import mixins from './mixins';

export default {
    mixins:[mixins],
    mounted(){
       
    }
}
</script>