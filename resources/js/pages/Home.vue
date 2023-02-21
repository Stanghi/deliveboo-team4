<script>
import RestaurantsCards from '../components/RestaurantsCards.vue';
import Category from '../components/Category.vue';

export default {
    name: "Home",
    components: {
        RestaurantsCards,
        Category,
    }
};
</script>

<template>
    <h1>Home</h1>
    <Category />
    <RestaurantsCards />

</template>

<style></style>
