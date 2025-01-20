<template>
    <div class="click-button" :class="type">
        <prime-icon :name="icon" v-if="icon" />
        {{ label }}
    </div>
</template>

<script setup>
    defineProps({
        label: {type: String, default: ''},
        type:  {type: String, default: 'primary'},
        icon:  {type: String, default: null},
    })
</script>
