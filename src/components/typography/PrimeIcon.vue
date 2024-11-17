<template>
    <i :class="`pi pi-${name}`" />
</template>
<script setup>
    const props = defineProps({
        name: String,
    })
</script>
<style>
a .pi {
    margin-left: 4px;
    margin-right: 4px;
    font-weight: 100;
    font-size: 0.8em;
    opacity: .8;
}
</style>
