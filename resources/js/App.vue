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
};
</script>

<template>
    <Header />
    <Jumbotron />
    <main>
        <router-view> </router-view>
    </main>
    <Footer />
    <Btn />
</template>

<style lang="scss">
@use "../scss/appVue.scss";
</style>
