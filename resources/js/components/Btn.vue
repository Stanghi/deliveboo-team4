<script>
export default {
    name: "Btn",
    methods: {
        scrollToTop(){
            window.scrollTo({top: 0, behaviour: "smooth"});
        },
    },
};
</script>

<template>
  <button class="scroll-top-button" @click="scrollToTop">
  <i class="fas fa-chevron-up"></i>
  </button>
</template>

<style lang="scss" scoped>
@use "../../scss/_variables.scss" as *;

.scroll-top-button {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background-color: $orange;
  color: $light-gray;
  border: none;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  font-size: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;

  &:hover {
    background-color: $light-gray;
    color: $orange;
    border: 1px solid $orange;
  }
}

</style>