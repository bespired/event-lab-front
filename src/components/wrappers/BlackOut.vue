<template>
    <div class="black-out" :class="active" />
</template>

<script setup>
    import { computed } from 'vue'
    import { useStore } from 'vuex'

    const store = useStore()

    const active = computed(() => {
        return store.state.main.isLoggedIn ? '' : 'active'
    })
</script>

<style>
    .black-out {
        position: fixed;
        display: flex;
        user-select: none;

        top:0; left:0; right:0; bottom: 0;
        z-index: 9;
        opacity: 0.0;
        background-color: black;
        pointer-events: none;
        transition: opacity 300ms;

    }

    .black-out.active {
        opacity: 0.3;
        pointer-events: all;
    }
</style>
