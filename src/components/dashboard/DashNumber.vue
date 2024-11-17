<template>
    <span class="dashboard-number">
        {{ label }}
    </span>
</template>

<script setup>
    defineProps({
        label: Number,
    })
</script>

<style>
    .dashboard-number {
        font-size: 1.8em;
    }
</style>