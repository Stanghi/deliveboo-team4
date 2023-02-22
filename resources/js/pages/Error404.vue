<script>
export default {
    name: "Error404",
    mounted(){
        const all = document.querySelector('.all');
        all.addEventListener('animationiteration', () =>{
            all.classList.add('all--animation-complete');
        });
    },
};
</script>

<template>
    <div class="all">
        <h1>404</h1>
        <p>Pagina non trovata</p>
    </div>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;
    .all{
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: url("https://t.ly/dXMr") no-repeat center center fixed;
        background-color: $white;
        background-size: cover;
        h1, p{
        font-size: 100px;
        color: $white;
        display: flex;
        justify-content: center;
        align-items: center;
        }
        h1{
            margin-top: 300px;
        }
        @media screen and (max-width: 992px) {
            h1, p{
            font-size: 50px;
            }
        }
        animation: rotate-background 3s linear infinite;
        animation-delay: 3s;
        @keyframes rotate-background {
          from {
            transform: rotate(0deg);
          }
          to {
            transform: rotate(-11deg);
          }
        }
        &.all--animation-complete {
        animation: none;
        transform: rotate(-11deg);
        }
    }
</style>
