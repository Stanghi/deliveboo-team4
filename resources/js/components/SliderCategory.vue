<script>
import { Navigation } from "swiper";
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
import "swiper/css/navigation";

export default {
    name: "SliderCategory",
    components: {
        Swiper,
        SwiperSlide,
    },
    props: {
        categories: Array,
    },
    setup() {
        return {
            modules: [Navigation],
        };
    },
};
</script>

<template>
    <swiper
        :modules="modules"
        :slides-per-view="8"
        :space-between="15"
        :navigation="true"
        class="mySwiper px-5"
    >
        <swiper-slide v-for="(category, index) in categories" :key="index">
            <div class="card">
                <img
                    :src="`/storage/${category.img}`"
                    class="card-img-top"
                    alt="..."
                />
                <div class="card-body">
                    <h6 class="card-title">{{ category.name }}</h6>
                </div>
            </div>
        </swiper-slide>
    </swiper>
</template>

<style scoped lang="scss">
@use "../../scss/_variables.scss" as *;
.card {
    height: 100%;
    cursor: pointer;
    img {
        height: 100%;
        object-fit: cover;
    }
}
</style>
