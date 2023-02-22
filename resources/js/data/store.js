import { reactive } from "vue";

export const store = reactive({
    restaurants: [],
    categories: [],
    filterCategory: new Array(),
    selectedProducts: [],
});
