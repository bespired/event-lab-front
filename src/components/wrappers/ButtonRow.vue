<template>
    <div class="button-row" :class="type">
        <slot />
    </div>
</template>

<script setup>
    defineProps({
        type:  String,
    })
</script>
