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
        <div class="cart-container py-5 px-4">
            <div v-if="!cart.isEmpty()">
                <div class="box pt-2">
                    <h3 class="Current">Carrello {{ cart.restaurant.name }}</h3>
                    <h5 class="Action" @click="removeAllProducts()">
                        Svuota Carrello
                    </h5>
                </div>

                <div
                    v-for="(item, index) in cart.items"
                    :key="index"
                    class="box box-items"
                >
                    <div class="image-item">
                        <img :src="`/storage/${item.product.img}`" />
                    </div>
                    <div class="info-items">
                        <h1 class="title">{{ item.product.name }}</h1>
                        <span>{{ formatPrice(item.product.price) }}</span>
                    </div>
                    <div class="bnt-box d-flex align-items-center ms-2">
                        <button
                            class="btn"
                            @click="removeFromCart(item.product)"
                        >
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <span class="mx-2">{{ item.quantity }}</span>
                        <button
                            class="btn me-2"
                            @click="addToCart(item.product)"
                        >
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                    <div class="prices">
                        <div class="amount">
                            {{ formatPrice(item.totalPrice) }}
                        </div>
                        <div class="remove">Elimina</div>
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
                        <button class="button">Checkout</button>
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
    border-radius: 20px;
    box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.25);
    .box {
        margin: auto;
        width: 90%;
        height: 15%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .Current {
        font-size: 20px;
        font-weight: 700;
        color: #2f3841;
    }
    .Action {
        font-size: 14px;
        font-weight: 600;
        color: #e44c4c;
        cursor: pointer;
        border-bottom: 1px solid #e44c4c;
    }
    .box-items {
        .image-item {
            width: 15%;
            img {
                width: 100%;
            }
        }
        .info-items {
            width: 20%;
            .title {
                padding-top: 5px;
                line-height: 10px;
                font-size: 20px;
                font-weight: 800;
                color: #202020;
            }
            .subtitle {
                line-height: 10px;
                font-size: 10px;
                font-weight: 600;
                color: #909090;
            }
        }
        .bnt-box {
            width: 15%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            .btn {
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
            text-align: right;
            .amount {
                padding-top: 20px;
                font-size: 26px;
                font-weight: 800;
                color: #202020;
            }
            .remove {
                padding-top: 5px;
                font-size: 14px;
                font-weight: 600;
                color: #e44c4c;
                cursor: pointer;
            }
        }
    }
    .checkout {
        border-top: 2px solid #909090;
        margin: auto;
        width: 90%;
        display: flex;
        justify-content: end;
        .total {
            text-align: end;
            .Subtotal {
                font-size: 18px;
                font-weight: 700;
                color: #202020;
            }
            .items {
                font-size: 16px;
                font-weight: 500;
                color: #909090;
                line-height: 10px;
            }
            .total-amount {
                font-size: 26px;
                font-weight: 900;
                color: #202020;
            }

            .button {
                margin-top: 5px;
                width: 100%;
                height: 40px;
                border: none;
                background: $orange;
                border-radius: 20px;
                cursor: pointer;
                font-size: 16px;
                font-weight: 600;
                color: $dark-gray;
            }
        }
    }
}
</style>
