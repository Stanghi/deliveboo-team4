<!-- Ciao Manuel :) -->
<script>
export default {
    name: "SearchBar",
    data(){
        return{
            searched: ''
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

            <div class="col-8 offset-2 debug d-flex align-items-center">
                <input
                    type="text" class="form-control me-1" id="search"
                    v-model="searched"
                    @keyup.enter="startSearch()"
                    placeholder="Cerca il tuo ristorante...">
                <button type="button" class="btn btn-primary" @click="startSearch()">Cerca</button>

            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>

.debug{
    background-color: rgba(255, 0, 0, 0.137);
}

</style>
