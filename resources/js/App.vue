<script>
import Header from "./components/Header.vue";
import Jumbotron from "./components/Jumbotron.vue";
import Footer from "./components/Footer.vue";
import Btn from "./components/Btn.vue";

export default {
    name: "App",
    components: {
        Header,
        Jumbotron,
        Footer,
        Btn,
    },
    methods: {
        isHome() {
            return this.$route.name === "home";
        },
        isRestaurant() {
            return this.$route.name === "ristorante";
        },
    },
};
</script>

<template>
    <Header />
    <Jumbotron v-show="$route.name == 'home'" />
    <main>
        <router-view> </router-view>
    </main>
    <Footer />
    <Btn />
</template>

<style lang="scss">
@use "../scss/appVue.scss";
</style>
