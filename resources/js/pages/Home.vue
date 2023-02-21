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
    <Category />
    <RestaurantsCards />

</template>

<style></style>
