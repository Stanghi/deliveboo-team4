<script>
import { Navigation, Autoplay, EffectCreative } from "swiper";
import { Swiper, SwiperSlide } from "swiper/vue";
import { store } from "../data/store";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/effect-creative";

export default {
    name: "SliderRestaurantsEvidence",
    components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
        return {
            modules: [Navigation, Autoplay, EffectCreative],
        };
    },
    data() {
        return {
            store,
        };
    },
};
</script>

<template>
    <swiper
        :modules="modules"
        :slides-per-view="1"
        :speed="1500"
        :effect="'creative'"
        :creativeEffect="{
            prev: {
                shadow: true,
                translate: ['0%', 0, -1],
            },
            next: {
                translate: ['120%', 0, 0],
            },
        }"
        :autoplay="{
            delay: 6000,
            disableOnInteraction: false,
        }"
        :loop="true"
        navigation
        class="mySwiper px-5"
    >
        <swiper-slide
            v-for="restaurant in store.restaurantsInEvidence"
            :key="restaurant.slug"
        >
            <router-link :to="{ name: 'home' }">
                <div class="restaurant-image">
                    <img
                        :src="`/storage/${restaurant.img}`"
                        :alt="restaurant.name"
                    />
                </div>
            </router-link>
        </swiper-slide>
    </swiper>
</template>

<style scoped lang="scss">
@use "../../scss/_variables.scss" as *;

.restaurant-image {
    width: 100%;
    height: 500px;
    border-radius: 10px;
    img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
    cursor: pointer;
}
</style>
