<script>
import axios from "axios";
import { baseUrl } from "../data/data";
import { store } from "../data/store";
export default {
    name: "Cart",
    data() {
        return {
            baseUrl,
            store,
            apiToken: null,
        };
    },
    computed: {
        cart() {
            return this.$store.getters.getCart;
        },
    },
    methods: {
        removeAllProducts() {
            this.cart.clear();
            this.$store.commit("updateCart");
        },

        formatPrice(price) {
            return new Intl.NumberFormat("it-IT", {
                style: "currency",
                currency: "EUR",
            }).format(price);
        },
        addToCart(product) {
            this.cart.addItem(product, store.restaurant);
            this.$store.commit("updateCart");
        },

        removeFromCart(product) {
            console.log(product);
            this.cart.decreaseItem(product);
            this.$store.commit("updateCart");
        },
        productQuantityInCart(product) {
            const item = this.cart.findItem(product);
            if (item) {
                return item.quantity;
            }
        },
        deleteItem(product) {
            this.cart.deleteItem(product);
            this.$store.commit("updateCart");
        },
        createDropIn(token) {
            // Step two: create a dropin instance using that container (or a string
            //   that functions as a query selector such as `#dropin-container`)
            console.log("dropin-container: ");
            console.log(document.getElementById("dropin-container"));
            braintree.dropin
                .create({
                    authorization: token,
                    locale: "it_IT",
                    container: document.getElementById("dropin-container"),
                    // ...plus remaining configuration
                })
                .then((dropinInstance) => {
                    // Use `dropinInstance` here
                    // Methods documented at https://braintree.github.io/braintree-web-drop-in/docs/current/Dropin.html
                })
                .catch((error) => {});
        },
        getToken() {
            axios
                .get(baseUrl + "orders/generate")
                .then((result) => {
                    this.token = result.data.token;
                    this.createDropIn(this.token);
                });
        },
    },
    mounted() {
        this.createDropIn();
        this.getToken();
    },
};
</script>
<template>
    <div class="container my-5 p-3 rounded bg-light">
        <div class="row no-gutters">
            <div class="col-md-8" v-if="!cart.isEmpty()">
                <div class="product-details">
                    <div class="top">
                        <span class="">
                            <button
                                class="btn"
                                @click="deleteItem(item.product)"
                            >
                                <i class="fa-solid fa-utensils"></i>
                                Torna a
                                <span class="fw-bolder">{{
                                    cart.restaurant.name
                                }}</span>
                            </button>
                        </span>
                        <button
                            @click="removeAllProducts()"
                            class="btn ml-2 mx-2 fw-bolder"
                            title="Rimuovi tutti i prodotti"
                        >
                            Svuota carrello
                        </button>
                    </div>

                    <div
                        v-for="(item, index) in cart.items"
                        :key="index"
                        class="d-flex align-items-center row-product"
                    >
                        <div class="left">
                            <div class="d-flex img-item">
                                <img
                                    :src="`/storage/${item.product.img}`"
                                    width="100"
                                />
                            </div>
                            <div class="d-flex flex-column">
                                <span class="fw-bolder">
                                    {{ item.product.name }}</span
                                ><span
                                    >Prezzo Unitario
                                    {{ formatPrice(item.product.price) }}</span
                                >
                            </div>
                        </div>
                        <div class="right">
                            <div class="btn-box">
                                <button
                                    title="Rimuovi tutti i prodotti"
                                    class="btn me-2"
                                    @click="deleteItem(item.product)"
                                >
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <button
                                    title="Rimuovi un prodotto"
                                    class="btn"
                                    @click="removeFromCart(item.product)"
                                >
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <span class="mx-2">{{
                                    productQuantityInCart(item.product)
                                }}</span>
                                <button
                                    title="Aggiungi un prodotto"
                                    class="btn me-2"
                                    @click="addToCart(item.product)"
                                >
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                            <div class="total-amount">
                                {{ formatPrice(item.totalPrice) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="total-amount d-flex justify-content-between fs-4">
                    <div>Totale:</div>
                    <div>{{ formatPrice(cart.amount) }}</div>
                </div>
            </div>
            <div
                class="d-flex justify-content-center align-items-center prova"
                v-else
            >
                <span
                    class="d-flex flex-column align-items-center fs-5 empty-cart"
                >
                    <i class="fa-solid fa-cart-shopping mb-2"></i>
                    Il carrello è vuoto
                </span>
            </div>
        </div>
        <div id="dropin-container"></div>
    </div>
</template>

<style scoped lang="scss">
@use "../../scss/_variables.scss" as *;

.container {
    min-height: calc(100vh - 60px - 368px - 98px);
}

.btn {
    font-size: 0.9rem;
    background-color: $light-gray;
    color: $dark-gray;
    &:hover {
        background-color: $orange;
        color: $light-gray;
    }
}

.top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
    // d-flex flex-row align-items-center mb-3
}

.row-product {
    padding: 10px;
    border-top: 3px solid $light-gray;
    &:last-child {
        border-bottom: 3px solid $light-gray;
    }
}

.left {
    display: flex;
    align-items: center;
    width: 70%;
    .img-item {
        height: 80px;
        width: 80px;
        border-radius: 10px;
        overflow: hidden;
        margin-right: 15px;
        img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    }
}

.right {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 30%;
    height: 80px;
}

.total-amount {
    padding: 10px;
    font-weight: bolder;
}

.empty-cart {
    opacity: 0.5;
}
</style>
