<script>
export default {
    name: "RestaurantItem",
};
</script>

<template>
    <div class="col">
        <div class="card d-flex flex-row mb-4">
            <img src="../../img/placeholder.png" alt="placeholder" />
            <div class="card-body">
                <h5 class="card-title">Ristorante La Medusa</h5>
                <p class="card-text address">
                    Via Roma, 25 Milano
                </p>
                <span class="category">Categoria</span>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">

.card {
    border-radius: 10px;
}
img {
    height: 50px;
}
</style>
