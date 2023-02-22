<script>
export default {
    name: "Jumbotron",
    props: {
        restaurant: Object,
    },
};
</script>

<template>
    <div
        class="jumbotron"
        :style="{ backgroundImage: `url(/storage/${restaurant.img})` }"
    >
        <div class="container p-0">
            <h2>{{ restaurant.name }}</h2>
            <h4>{{ restaurant.address }}</h4>
            <img :src="restaurant.img" alt="" />
            <span
                class="badge fw-normal me-2"
                v-for="(categories, index) in restaurant.categories"
                :key="index"
            >
                {{ categories.name }}
            </span>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

.jumbotron {
    display: flex;
    //justify-content: center;
    align-items: center;
    width: 100%;
    height: 450px;
    box-shadow: inset 0px 100px 100px rgba(0, 0, 0, 0.25);
    color: $white;

    background: rgba(0, 0, 0, 0.6);
    background-blend-mode: darken;
    background-position: center 55%;
    background-repeat: no-repeat;
    background-size: cover;

    h2 {
        font-size: 4rem;
        //margin-left: 100px;
    }

    .badge {
        background-color: $light-gray;
        color: $dark-gray;
    }
}
</style>
