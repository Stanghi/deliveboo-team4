<script>
export default {
    name: "CategoryCard",
    props: {
        category: Object,
    },
    data() {
        return {};
    },
};
</script>
<!--  -->
<template>
    <div class="card">
        <!-- style="width: 18rem" -->
        <img :src="`/storage/${category.img}`" class="card-img-top" alt="..." />
        <div class="card-body d-flex align-items-center">
            <h6 class="card-title">
                <i class="fa-solid fa-check"></i>
                {{ category.name }}
            </h6>
        </div>
    </div>
</template>

<style scoped lang="scss">
@use "../../scss/_variables.scss" as *;
.card {
    height: 100px;
    width: 150px;
    img {
        height: 65%;
        object-fit: cover;
    }
    .card-body {
        height: calc(100% - 65%);
    }
    .fa-check {
        display: none;
    }
    &:hover .fa-check {
        display: inline-block;
        font-size: 0.9rem;
        color: $orange;
    }
}
</style>
