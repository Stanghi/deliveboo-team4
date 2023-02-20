<script>
export default {
    name: "Header",
};
</script>

<template>
    <header class="debug">
        <div class="logo">
            <img class="me-3" src="../../img/logo.png" alt="logo" />
            <span class="fs-3 fw-bold">DeliveBoo</span>
        </div>
        <div class="logo">
            <span class="me-3">
                <router-link :to="{ name: 'home' }">Home</router-link>
            </span>
            <span class=""
                ><router-link :to="{ name: 'home' }">Team</router-link></span
            >
        </div>
        <div class="d-flex">
            <a href="/admin" class="me-3">Accedi al tuo ristorante </a>
            <span>
                <router-link :to="{ name: 'cart' }">
                    <i class="fa-solid fa-cart-shopping"></i>
                </router-link>
            </span>
        </div>
    </header>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 60px;
    width: 100vw;
    padding: 0 30px;
    background-color: $dark-gray;
    color: $white;

    .logo {
        display: flex;
        align-items: center;
        justify-content: center;
        img {
            width: 35px;
        }
    }
    a {
        text-decoration: none;
        color: $white;
        &:hover {
            text-decoration: underline;
        }
    }
    .fa-cart-shopping:hover {
        color: $orange;
    }
}
</style>
