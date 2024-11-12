<template>
    <div class="click-button" :class="type">
        {{ label }}
    </div>
</template>

<script setup>
    defineProps({
        label: String,
        type:  String,
    })
</script>
