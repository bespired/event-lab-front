<template>
    <span class="dashboard-link">
        {{ link }}
    </span>
</template>

<script setup>
    defineProps({
        link: String,
    })
</script>
