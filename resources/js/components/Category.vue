<!-- Ciao Federico :) -->
<script>
import axios from 'axios';
import {baseUrl} from '../data/data';
import {store} from '../data/store';
import SliderCategory from './SliderCategory.vue';

export default {
  components: {
    SliderCategory
   },
  name:'Category',
  data(){
    return {
        baseUrl,
        store
    }
  },
  methods:{
    getApi() {
            axios.get(this.baseUrl + 'restaurants').then((result) => {
                store.restaurants= result.data.restaurants;
                store.categories= result.data.categories;
                console.log(result.data);
            });
        },

      getCategories(category_id){
         axios.get(this.baseUrl + 'restaurants/getCategories/' + category_id )
         .then(result=>{
             console.log(result.data);
         })
      }
  },
  mounted(){
    this.getApi()
    this.getCategories()
  }
}
</script>

<template>
  <div class="container">
    <div class="d-flex justify-content-between">
        <SliderCategory :categories="store.categories"/>
    </div>
  </div>
</template>

<style lang="scss">

</style>
