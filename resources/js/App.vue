<script>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
import Btn from "./components/Btn.vue";
export default {
    name: "App",
    components: {
        Header,
        Footer,
        Btn,
    },
};
</script>

<template>
    <Header />
    <router-view></router-view>
    <Footer />
    <Btn />
</template>

<style lang="scss">
@use "../scss/appVue.scss";
</style>
