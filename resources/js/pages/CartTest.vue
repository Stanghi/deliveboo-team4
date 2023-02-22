<script>
export default {
  name: "CartTest",
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
  },
};
</script>

<template>
  <h1>Carrello prodotti</h1>
  <div v-if="!cart.isEmpty()" class="cart">
    <h3>Ristorante: {{ cart.restaurant.name }}</h3>
    <ul>
      <li v-for="item in cart.items" :key="item.product.id">
        <div class="product">
          <h3>{{ item.product.name }}</h3>
          <p>Quantità: {{ item.quantity }}</p>
          <p>Totale: &euro;{{ item.totalPrice }}</p>
        </div>
      </li>
    </ul>
    <h4>Totale Carrello: &euro;{{ cart.amount }}</h4>
    <button @click="removeAllProducts">
      Svuota Carrello
    </button>
  </div>
  <h4 v-else>Il tuo carrello è vuoto</h4>
</template>

<style lang="scss">
.product {
  margin-top: 1rem;
}
h4 {
  margin-top: 3rem;
}
button {
  padding: 10px 15px;
  margin-top: 1rem;
}
</style>
