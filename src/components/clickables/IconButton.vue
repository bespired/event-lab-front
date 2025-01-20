<template>
    <div class="icon-button" :class="type">
        <prime-icon :name="icon" />
    </div>
</template>

<script setup>
    defineProps({
        type: String,
        icon: String,
    })
</script>
