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
