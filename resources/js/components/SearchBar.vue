<script>

import { store } from '../data/store';

export default {
    name: "SearchBar",
    data(){
        return{
            searched: '',
            store
        }
    },
    methods:{
        startSearch(){
            console.log(this.searched);
            this.searched = ''
        }
    }
}
</script>
<template lang="">
    <div class="container">
        <div class="row">

            <div class="col-8 offset-2 d-flex align-items-center">
                <div class="input-group mb-3">
                    <input type="text" class="form-control my-input" aria-label="Recipient's username" aria-describedby="button-addon2"
                    v-model="searched"
                    @keyup.enter="startSearch()"
                    placeholder="Cerca il tuo ristorante...">
                    <button class="btn my-btn-color" type="button" id="button-addon2" @click="startSearch()">Cerca</button>
                </div>



            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

.debug{
    background-color: rgba(255, 0, 0, 0.137);
}
.my-input{
    box-shadow: inset 1px 1px 1px rgba(0, 0, 0, 0.5);
    border: 0;
}
.my-btn-color{
    background-color: $orange;
    color: $white;
    &:hover{
        background-color: white;
        border: 1px solid $orange;
        color: $orange;
    }
}

</style>
