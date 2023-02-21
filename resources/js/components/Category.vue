<script>
import axios from "axios";
import { baseUrl } from "../data/data";
import { store } from "../data/store";
import SliderCategory from "./SliderCategory.vue";

export default {
    components: {
        SliderCategory,
    },
    name: "Category",
    data() {
        return {
            baseUrl,
            store,
        };
    },
    methods: {
        getApi() {
            axios.get(this.baseUrl + "restaurants").then((result) => {
                store.restaurants = result.data.restaurants;
                store.categories = result.data.categories;
            });
        },

        getCategories(category_id) {
            axios
                .get(this.baseUrl + "restaurants/getCategories/" + category_id)
                .then((result) => {
                    console.log("x");
                });
        },
    },
    mounted() {
        this.getApi();
        this.getCategories();
    },
};
</script>

<template>
    <div class="container m-0 p-0">
        <SliderCategory :categories="store.categories" />
    </div>
</template>

<style lang="scss"></style>
