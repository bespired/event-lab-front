<template>
    <div class="big-label">
        {{ label }}
        <slot />
    </div>
</template>

<script setup>
    defineProps({
        label: String,
    })
</script>

<style>
    .big-label {
        padding-top: 8px;
        padding-bottom: 16px;
        font-size: 16px;
        font-weight: 700;
    }
</style>