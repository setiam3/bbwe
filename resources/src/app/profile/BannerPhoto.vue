<template>
  <div class="profile_banner_photo_container">
     <a href="/site/updateprofile"> <img :src="`/${user.photo}`" alt=""></a>
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