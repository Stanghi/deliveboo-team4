<script>
import RestaurantsCards from '../components/RestaurantsCards.vue';
import SearchBar from '../components/SearchBar.vue';
export default {
    name: "Home",
    components: {
    RestaurantsCards,
    SearchBar
}
};
</script>

<template>
    <h1>Home</h1>
    <SearchBar />
    <RestaurantsCards />

</template>

<style></style>
