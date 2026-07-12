<template>
    <transition name="slide">
        <div class="alert feedback alert-warning" role="alert" v-show="show">
            <strong v-text="title"></strong>
            <div class="container">
                <slot name="message"></slot>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    props: {
        show: Boolean,
        title: String
    }
}
</script>

<style lang="scss" scoped>
.slide-enter-active, 
.slide-leave-active {
  transition: all .3s ease-in;
}
.slide-enter, .slide-leave-to {
  transform: translateX(10px);
  opacity: 0;
}
</style>
