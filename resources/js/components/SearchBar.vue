<script>
import { store } from "../data/store";
import axios from "axios";

export default {
    name: "SearchBar",
    data() {
        return {
            searched: "",
            store,
            baseUrl: "http://127.0.0.1:8000/api/restaurants",
        };
    },
    methods: {
        startSearch() {
            axios
                .get(this.baseUrl + "/search", {
                    params: {
                        searched: this.searched,
                    },
                })
                .then((result) => {
                    store.restaurants = result.data.restaurants;
                });
            this.searched = "";
            console.log(store.restaurants);
        },
    },
};
</script>
<template lang="">
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 d-flex align-items-center">
                <div class="input-group">
                    <input
                        type="text"
                        class="form-control"
                        aria-label="Recipient's username"
                        aria-describedby="button-addon2"
                        v-model="searched"
                        @keyup.enter="startSearch()"
                        placeholder="Cerca un ristorante per nome..."
                    />
                    <button
                        class="btn my-btn-color fw-bold"
                        type="button"
                        id="button-addon2"
                        @click="startSearch()"
                    >
                        Cerca
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

.my-btn-color {
    background-color: $orange;
    color: $white;
    &:hover {
        background-color: $white;
        border: 1px solid $orange;
        color: $orange;
    }
}

.input-group {
    border-radius: 10px;
    box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.25);

    .form-control {
        border: none;
        &:focus {
            border-color: $orange;
            box-shadow: 0 0 0 0.2rem rgba(241, 90, 37, 0.25);
        }
    }
}
</style>
