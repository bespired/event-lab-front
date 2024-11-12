<template>
    <div class="alert-bar" :class="type">
        {{ label }}
        <slot />
    </div>
</template>

<script setup>
    defineProps({
        type:  String,
        label: String,
    })
</script>
