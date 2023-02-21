<script>
export default {
  name: 'CategoryCard',
  props:{
    category: Object
  },
  data(){
    return{
      }
  },


}
</script>

<template>

<div class="card">
  <img :src="`/storage/${category.img}`" class="card-img-top" alt="...">
  <div class="card-body">
    <h6 class="card-title">{{category.name}}</h6>
  </div>
</div>

</template>

<style scoped lang="scss">
    .card{
        height: 100%;
        img{
            height:100%;
            object-fit:cover;
        }
    }
</style>
