<script>
import RestaurantsCards from '../components/RestaurantsCards.vue';

import SearchBar from '../components/SearchBar.vue';


import Category from '../components/Category.vue';

export default {
    name: "Home",
    components: {
        RestaurantsCards,
        Category,
        SearchBar
        
    }

};
</script>

<template>
    <h1>Home</h1>

    

    <Category />
    
    <SearchBar />

    <RestaurantsCards />

</template>

<style></style>
