<script>
import { store } from "../data/store";
export default {
    name: "Team",
    props: {
        products: Object,
    },
    data() {
        return {
            store,
        };
    },
    methods: {
        formatPrice(price) {
            return new Intl.NumberFormat("it-IT", {
                style: "currency",
                currency: "EUR",
            }).format(price);
        },
        addProduct(product, boolean) {
            if (
                !this.store.selectedProducts.includes(product) &&
                boolean === true
            ) {
                this.store.selectedProducts.push(product);
            } else if (boolean === false) {
                const index = this.store.selectedProducts.indexOf(product);
                this.store.selectedProducts.splice(index, 1);
            }
            console.log(this.store.selectedProducts, this.counter);
        },
        removeProduct(product) {
            console.log(product, "Rimosso");
        },
    },
    mounted() {
        this.formatPrice();
        console.log(this.store.selectedProducts.length);
    },
};
</script>

<template>
    <div class="card d-flex flex-row mb-5 mx-2">
        <div class="card-image">
            <img
                v-if="products.img"
                :src="`/storage/${products.img}`"
                :alt="products.name"
            />
            <img v-else src="../../img/placeholder.png" :alt="products.name" />
        </div>
        <div class="card-body">
            <h5 class="card-title fw-bold">
                {{ products.name }}
            </h5>
            <p>{{ products.description }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="m-0">{{ formatPrice(products.price) }}</h4>

                <div class="bnt-box">
                    <button
                        class="btn me-2"
                        @click="addProduct(products.name, true)"
                    >
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <button
                        class="btn"
                        @click="addProduct(products.name, false)"
                    >
                        <i class="fa-solid fa-minus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
@use "../../scss/_variables.scss" as *;
.card {
    border-radius: 10px;
    box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.25);
    position: relative;
    .card-image {
        position: absolute;
        width: 90px;
        height: 90px;
        top: 50%;
        transform: translate(-15px, -50%);
        img {
            height: 100%;
            width: 100%;
            border-radius: 10px;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.25);
            object-fit: cover;
        }
    }

    .card-body {
        width: 100%;
        padding-left: 100px;
        white-space: nowrap;

        h5,
        p {
            color: $dark-gray;
            white-space: pre-wrap;
        }

        .address {
            width: 100%;
            font-size: 1rem;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .category-box {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            .badge {
                background-color: $light-gray;
                color: $dark-gray;
            }
        }

        .btn {
            background-color: $light-gray;
            color: $dark-gray;
            &:hover {
                background-color: $orange;
                color: $light-gray;
            }
        }
    }
}
</style>
