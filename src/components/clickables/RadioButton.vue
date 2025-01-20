<template>
    <div class="radio-button" :class="[type, passive]" @click="model=props.value">
        <prime-icon :name="icon" v-if="icon" />
        {{ label }}
    </div>
</template>

<script setup>

    import { ref, computed } from 'vue'

    const props = defineProps({
        label: {type: String, default: ''},
        type:  {type: String, default: 'primary'},
        value: {type: String, default: null},
        icon:  {type: String, default: null},
    })

    const model = defineModel()

    const passive = computed(() => {
        return props.value !== model.value ? 'passive' : ''
    })


</script>
