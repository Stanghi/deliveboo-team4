<script>
export default {
    name: "RestaurantItem",
};
</script>

<template>
    <div class="col">
        <router-link :to="{name: 'home'}" class="text-decoration-none">
            <div class="card d-flex flex-row pe-5 mb-5 mx-2">
                <div class="card-image">
                    <img src="../../img/placeholder.png" alt="placeholder" />
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Ristorante La Medusa</h5>
                    <p class="card-text address">Via Roma, 25 Milano</p>
                    <span class="category badge fw-normal">Categoria</span>
                </div>
            </div>
        </router-link>
    </div>
</template>

<style scoped lang="scss">
@use "../../scss/_variables.scss" as *;

.card {
    border-radius: 10px;
    box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.25);
    position: relative;
    .card-image {
        position: absolute;
        width: 90px;
        height: 90px;
        top: 50%;
        transform: translate(-15px, -50%);
        img {
            height: 100%;
            width: 100%;
            border-radius: 10px;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.25);
            object-fit: cover;
        }
    }

    .card-body {
        width: 100%;
        padding-left: 100px;
        white-space: nowrap;

        h5,
        p {
            color: $dark-gray;
        }

        h5 {
            white-space: pre-wrap;
        }

        .address {
            width: 100%;
            font-size: 1rem;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .badge {
            background-color: $light-gray;
            color: $dark-gray;
        }
    }
}
</style>
