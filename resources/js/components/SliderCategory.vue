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
        :breakpoints="{
            '480': {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            '767': {
                slidesPerView: 5,
                spaceBetween: 15,
            },
            '1024': {
                slidesPerView: 8,
                spaceBetween: 15,
            },
        }"
        :modules="modules"
        :navigation="true"
        class="mySwiper px-5"
    >
        <!--
        :slides-per-view="9"
        :space-between="15"
        -->
        <swiper-slide v-for="(category, index) in categories" :key="index">
            <div class="card">
                <img
                    :src="`/storage/${category.img}`"
                    class="card-img-top"
                    alt="..."
                />
                <div class="card-body">
                    <h6 class="card-title m-0 p-0">
                        <i class="fa-solid fa-check"></i>
                        {{ category.name }}
                    </h6>
                </div>
            </div>
        </swiper-slide>
    </swiper>
</template>

<style scoped lang="scss">
@use "../../scss/_variables.scss" as *;

.mySwiper {
    height: 100px;
}
.card {
    height: 100%;
    cursor: pointer;

    img {
        height: 65%;
        object-fit: cover;
    }
    .card-body {
        display: flex;
        align-items: center;
        height: calc(100% - 65%);
        white-space: nowrap;
        h6 {
            text-overflow: ellipsis;
            overflow: hidden;
            color: $dark-gray;
        }
        .fa-check {
            display: none;
        }
    }
    &:hover .fa-check,
    &:hover .card-title {
        display: inline-block;
        color: $orange;
    }
}
</style>
