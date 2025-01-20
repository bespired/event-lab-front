<template>
    <div class="event-svg">
        <img :src="`/svg/${name}.svg`" />
    </div>
</template>

<script setup>
    defineProps({
        name: String,
    })
</script>

<style>
    .event-svg {
        display: contents;
        height: 60px;
    }

    .event-svg img{
        padding: 0 6px;
        height: 40px;
    }
</style>