<template>
    <div class="click-button" :class="type">
        <prime-icon :name="icon" v-if="icon" />
        {{ label }}
    </div>
</template>

<script setup>
    defineProps({
        label: String,
        type:  String,
        icon:  String,
    })
</script>
