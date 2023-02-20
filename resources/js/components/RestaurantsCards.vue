<script>
import RestaurantItem from './RestaurantItem.vue';
export default {
    name: "RestaurantsCards",
    components: {
        RestaurantItem
    }
};
</script>

<template>
    <div class="container">
        <div class="row row-cols-3">
            <RestaurantItem v-for="i in 10" :key="i" />
        </div>
    </div>
</template>

<style>
</style>
