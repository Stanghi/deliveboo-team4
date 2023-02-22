<script>
export default {
  name: "ProductDetailModal",
  props: ["product"],
  data() {
    return {
    }
  },
  computed: {
    cart() {
      return this.$store.getters.getCart;
    },

    productQuantityInCart() {
      const item = this.cart.findItem(this.product);
      if(item) {
          return item.quantity;
      }
    }
  },
  methods: {
    addToCart() {
      this.cart.addItem(this.product);
      this.$store.commit("updateCart");
    },

    removeFromCart() {
      this.cart.removeItem(item);
      this.$store.commit("updateCart");
    },
  },
  mounted() {

  }
};
</script>

<template>
  <div class="card">
      <img :src="product.image" :alt="product.name" />
      <h3>{{ product.name }}</h3>
    <p>{{ product.description.substring(0, 15) }}...</p>

    <p>Prezzo: &euro;{{ product.price.toFixed(2) }}</p>

    <div class="buttons-container">
      <button v-if="!productQuantityInCart" @click="addToCart()">
        Aggiungi al carrello
      </button>

      <button v-if="productQuantityInCart" @click="removeFromCart()">
        &minus;
      </button>

      <span class="total-product" v-if="productQuantityInCart">{{
        productQuantityInCart
      }}</span>

      <button v-if="productQuantityInCart" @click="addToCart()">&plus;</button>
    </div>
  </div>
</template>

<style scoped lang="scss">
.card {
  margin-top: 2rem;
  width: calc(100% / 3);
  img {
    height: 200px;
  }
  a {
    cursor: pointer;
    h3 {
      color: black;
    }
  }
  .buttons-container {
    margin-top: 20px;
    button {
      padding: 10px;
    }
    .total-product {
      margin: 0 10px;
    }
  }
}
</style>
