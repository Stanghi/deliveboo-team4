<script>
import axios from "axios";
import JumbotronRestaurant from "../components/JumbotronRestaurant.vue";
import ProductCards from "../components/ProductCard.vue";
import { baseUrl } from "../data/data";
import { store } from "../data/store";

export default {
    name: "Restaurant",
    components: {
        ProductCards,
        JumbotronRestaurant,
    },
    data() {
        return {
            baseUrl,
            restaurant: "",
            products: [],
            store,
        };
    },
    methods: {
        getApi() {
            axios
                .get(this.baseUrl + "restaurants/" + this.$route.params.slug)
                .then((result) => {
                    this.success = result.data.success;
                    this.restaurant = result.data.restaurant;
                    this.products = result.data.products;
                })
                .catch((error) => {
                    if (error.response.status === 404) {
                        this.$router.push({ name: "404" });
                    }
                });
        },
    },

    mounted() {
        this.getApi();
    },
};
</script>

<template>
    <JumbotronRestaurant
        v-show="$route.name == 'restaurant'"
        :restaurant="restaurant"
    />

    <div class="container">
        <div class="my-5 d-flex">
            <div class="left pe-5">
                <h2 class="mb-5">Scopri il menù</h2>
                <ProductCards
                    v-for="(products, index) in products"
                    :key="index"
                    :products="products"
                />
            </div>
            <div class="right">
                <h2 class="mb-5">Riepilogo ordine</h2>
                <div class="riepilogo">
                    <span
                        v-if="this.store.selectedProducts.length >= 1"
                        v-for="product in this.store.selectedProducts"
                        :key="product.slug"
                    >
                        <p>{{ product }}</p>
                        <div class="bnt-box">
                            <button class="btn me-2">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                            <button class="btn">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                        </div>
                    </span>
                    <span v-else>Nessuno prodotto selezionato</span>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
@use "../../scss/_variables.scss" as *;

.left {
    width: 70%;
}

.right {
    width: 30%;
    .btn {
        background-color: $light-gray;
        color: $dark-gray;
        &:hover {
            background-color: $orange;
            color: $light-gray;
        }
    }
}
.riepilogo {
    padding: 20px;
    border-radius: 10px;
    background-color: $white;
    box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.25);

    span {
        padding: 10px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px dashed $dark-gray;

        p {
            margin: 0;
        }
    }
}
</style>
