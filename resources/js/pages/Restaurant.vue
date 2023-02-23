<script>
import axios from "axios";
import ProductCards from "../components/ProductCard.vue";
import { baseUrl } from "../data/data";
import { store } from "../data/store";

export default {
    name: "Restaurant",
    components: {
        ProductCards,
    },
    data() {
        return {
            baseUrl,
            products: [],
            store,
        };
    },
    computed: {
        cart() {
            return this.$store.getters.getCart;
        },
    },
    methods: {
        getApi() {
            axios
                .get(this.baseUrl + "restaurants/" + this.$route.params.slug)
                .then((result) => {
                    this.success = result.data.success;
                    store.restaurant = result.data.restaurant;
                    this.products = result.data.products;
                })
                .catch((error) => {
                    if (error.response.status === 404) {
                        this.$router.push({ name: "404" });
                    }
                });
        },
        removeAllProducts() {
            this.cart.clear();
            this.$store.commit("updateCart");
        },
        productQuantityInCart(product) {
            const item = this.cart.findItem(product);
            if (item) {
                return item.quantity;
            }
        },
        addToCart(product) {
            this.cart.addItem(product, this.restaurant);
            this.$store.commit("updateCart");
        },

        removeFromCart(product) {
            this.cart.removeItem(product);
            this.$store.commit("updateCart");
        },
        formatPrice(price) {
            return new Intl.NumberFormat("it-IT", {
                style: "currency",
                currency: "EUR",
            }).format(price);
        },
    },
    mounted() {
        this.getApi();
    },
};
</script>

<template>
    <div class="container">
        <div class="mb-5 d-flex">
            <div class="left pe-5">
                <h2 class="mb-5">Scopri il menù</h2>
                <ProductCards
                    v-for="(product, index) in products"
                    :key="index"
                    :product="product"
                    :restaurant="store.restaurant"
                />
            </div>
            <div class="right">
                <div class="sticky">
                    <h2 class="mb-5">Riepilogo ordine</h2>
                    <div class="riepilogo">
                        <div v-if="!cart.isEmpty()">
                            <h5>{{ cart.restaurant.name }}</h5>
                            <span
                                class="cart-items"
                                v-for="item in cart.items"
                                :key="item.slug"
                            >
                                <p class="product-name">
                                    {{ item.product.name }}
                                </p>
                                <div
                                    class="bnt-box d-flex align-items-center justify-content-between ms-2"
                                >
                                    <button
                                        class="btn"
                                        @click="removeFromCart(item.product)"
                                    >
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                    <span class="mx-2">{{
                                        productQuantityInCart(item.product)
                                    }}</span>
                                    <button
                                        class="btn me-2"
                                        @click="addToCart(item.product)"
                                    >
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <div class="">
                                        {{ formatPrice(item.totalPrice) }}
                                    </div>
                                </div>
                            </span>
                            <div
                                class="sub-total d-flex w-100 justify-content-between mt-4"
                            >
                                <h5>Subtotale</h5>
                                <h5>{{ formatPrice(cart.amount) }}</h5>
                            </div>
                        </div>
                        <span v-else>Nessuno prodotto selezionato</span>
                    </div>
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
        font-size: 0.7rem;
        background-color: $light-gray;
        color: $dark-gray;
        &:hover {
            background-color: $orange;
            color: $light-gray;
        }
    }

    .sticky {
        position: sticky;
        top: 100px;
        .riepilogo {
            padding: 20px;
            border-radius: 10px;
            background-color: $white;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.25);

            .product-name {
                width: 45%;
                white-space: pre-wrap;
            }

            .bnt-box {
                width: 55%;
            }

            .cart-items {
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
    }
}
</style>
