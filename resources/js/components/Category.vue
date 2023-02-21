<!-- Ciao Federico :) -->
<script>
import axios from 'axios';
import {baseUrl} from '../data/data';
import {store} from '../data/store';
import CategoryCard from './CategoryCard.vue';

export default {
  components: {CategoryCard,
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
  <div class="container debug">
    <h1>Categorie</h1>
    <div class="d-flex justify-content-between debug">
        <CategoryCard
        v-for="category in store.categories" :key="category.id" :category="category"
        />
    </div>
  </div>
</template>

<style lang="scss">

</style>
