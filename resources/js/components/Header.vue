<script>
export default {
    name: "Header",
    data() {
        return {
            view: {
                topOfPage: true,
            },
        };
    },
    beforeMount() {
        window.addEventListener("scroll", this.handleScroll);
    },
    methods: {
        handleScroll() {
            if (window.pageYOffset > 100) {
                if (this.view.topOfPage) this.view.topOfPage = false;
            } else {
                if (!this.view.topOfPage) this.view.topOfPage = true;
            }
        },
    },
};
</script>

<template>
    <header
        :class="{
            onScroll: !view.topOfPage,
            headerDark: $route.name == 'cart' || $route.name == 'team',
        }"
    >
        <router-link :to="{ name: 'home' }">
            <div class="logo">
                <img class="me-2" src="../../img/logo.png" alt="logo" />
                <span class="fs-3 fw-bold"> DeliveBoo </span>
            </div>
        </router-link>

        <div>
            <router-link class="me-3" :to="{ name: 'home' }">Home</router-link>
            <router-link :to="{ name: 'team' }">Team</router-link>
        </div>

        <div>
            <a href="/admin" class="me-3">Accedi al tuo ristorante </a>
            <router-link :to="{ name: 'cart' }">
                <i class="fa-solid fa-cart-shopping fs-5"></i>
            </router-link>
        </div>
    </header>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;
header {
    z-index: 999;
    position: fixed;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 60px;
    width: 100%;
    padding: 0 30px;
    transition: all 0.2s ease-in-out;
    color: $white;

    .logo {
        display: flex;
        align-items: center;
        justify-content: center;
        img {
            width: 30px;
        }
    }
    a {
        text-decoration: none;
        color: $white;
        font-weight: bolder;
        &:hover {
            text-decoration: underline;
            // color: $orange;
        }
    }
    .fa-cart-shopping:hover {
        color: $orange;
    }
}

.onScroll,
.headerDark {
    background-color: $dark-gray;
}
</style>
