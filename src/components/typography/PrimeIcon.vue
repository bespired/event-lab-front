<template>
    <i :class="`icon icon-${name}`" />
</template>
<script setup>
    const props = defineProps({
        name: String,
    })
</script>
<style>
a .icon {
    margin-left: 4px;
    margin-right: 4px;
    font-weight: 100;
    font-size: 0.8em;
    opacity: .8;
}
</style>
