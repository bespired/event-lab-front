<template>
    <img :src="eye" class="svg-icon-eye" >
</template>

<script setup>
    import { computed } from 'vue'

    const props = defineProps({
        strike: Boolean,
    })

    const eye = computed(() => {
        return props.strike ? '/svg/eye-strike.svg' : '/svg/eye.svg'
    })
</script>

<style>
    .svg-icon-eye {
        height: 32px;
    }
</style>