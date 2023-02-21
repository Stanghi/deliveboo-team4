<script>
import Header from "./components/Header.vue";
import Jumbotron from "./components/Jumbotron.vue";
export default {
    name: "App",
    components: {
        Header,
        Jumbotron,
    },
};
</script>

<template>
    <Header />
    <Jumbotron />
    <main>
        <router-view> </router-view>
    </main>
</template>

<style lang="scss">
@use "../scss/appVue.scss";
</style>
