<template>
    <span class="dashboard-label">
        {{ label }}
    </span>
</template>

<script setup>
    defineProps({
        label: String,
    })
</script>

<style>
    .dashboard-label {
        font-size: 0.9em;
    }
</style>