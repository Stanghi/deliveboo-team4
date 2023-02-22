import { reactive } from "vue";

export const store = reactive({
    restaurants: [],
    categories: [],
    allRestaurants: [],
    restaurantsInEvidence: []
    filterCategory: new Array(),
    selectedProducts: [],
});
