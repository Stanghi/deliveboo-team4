<script>
export default {
    name: "Cart",
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
            this.cart.addItem(product, this.restaurant);
            this.$store.commit("updateCart");
        },

        removeFromCart(product) {
            this.cart.removeItem(product);
            this.$store.commit("updateCart");
        },
    },
};
</script>

<template>
    <div class="container py-5">
        <h1 class="mb-5">Riepilogo Carrello</h1>
        <div class="cart-container py-5">
            <div v-if="!cart.isEmpty()">
                <div class="box">
                    <h3 class="current">Carrello {{ cart.restaurant.name }}</h3>
                    <h5 class="action" @click="removeAllProducts()">
                        Svuota Carrello
                    </h5>
                </div>

                <div
                    v-for="(item, index) in cart.items"
                    :key="index"
                    class="box"
                >
                    <div class="d-flex left">
                        <div class="image-item">
                            <img :src="`/storage/${item.product.img}`" />
                        </div>
                        <div class="info-items debug">
                            <p>{{ item.product.name }}</p>
                            <span
                                >Prezzo Unitario
                                {{ formatPrice(item.product.price) }}</span
                            >
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="bnt-box d-flex align-items-center">
                            <button
                                title="Rimuovi tutti i prodotti"
                                class="btn me-2"
                                @click="removeFromCart(item.product)"
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
                            <span class="mx-2">{{ item.quantity }}</span>
                            <button
                                title="Aggiungi un prodotto"
                                class="btn me-2"
                                @click="addToCart(item.product)"
                            >
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                        <div class="prices fw-bolder">
                            {{ formatPrice(item.totalPrice) }}
                        </div>
                    </div>
                </div>

                <div class="checkout mt-2">
                    <div class="total my-2">
                        <div>
                            <div class="Subtotal">Subtotale</div>
                            <div v-if="cart.totalQuantity > 1" class="items">
                                {{ cart.totalQuantity }} Prodotti
                            </div>
                            <div v-else class="items">1 Prodotto</div>
                        </div>

                        <div class="total-amount">
                            {{ formatPrice(cart.amount) }}
                        </div>
                        <button class="btn btn-checkout">Checkout</button>
                    </div>
                </div>
            </div>
            <h5 v-else>Il carrello è vuoto</h5>
        </div>
    </div>
</template>

<style scoped lang="scss">
@use "../../scss/_variables.scss" as *;

.cart-container {
    width: 100%;
    height: 85%;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.25);
    .box {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .current {
        font-size: 20px;
        font-weight: 700;
        color: #2f3841;
    }
    .action {
        font-size: 14px;
        font-weight: 600;
        color: #e44c4c;
        cursor: pointer;
        border-bottom: 1px solid #e44c4c;
    }

    .left {
        width: 75%;
        .image-item {
            height: 100px;
            width: 100px;
            border-radius: 10px;
            overflow: hidden;
            img {
                object-fit: cover;
                width: 100%;
                height: 100%;
            }
        }
        .info-items {
            width: calc(100% - 100px);

            p {
                font-size: 1.4rem;
                margin: 0;
                color: $dark-gray;
            }
        }
    }
    .bnt-box {
        display: flex;
        justify-content: space-between;
        align-items: center;
        .btn {
            font-size: 0.8rem;
            background-color: $light-gray;
            color: $dark-gray;
            &:hover {
                background-color: $orange;
                color: $light-gray;
            }
        }
        .count {
            font-size: 15px;
            font-weight: 900;
            color: #202020;
        }
    }
    .prices {
        height: 100%;
    }
    .checkout {
        border-top: 2px solid $dark-gray;
        margin: auto;
        width: 90%;
        display: flex;
        justify-content: end;
        .total {
            text-align: end;
            .Subtotal {
                font-size: 18px;
                font-weight: 700;
                color: $dark-gray;
            }
            .items {
                font-size: 16px;
                font-weight: 500;
                color: $dark-gray;
                line-height: 10px;
            }
            .total-amount {
                font-size: 26px;
                font-weight: 900;
                color: $dark-gray;
            }

            .btn-checkout {
                background: $orange;
                color: $white;
            }
        }
    }
}
</style>
