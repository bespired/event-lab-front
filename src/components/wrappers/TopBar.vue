<template>
    <div class="top-bar" :class="visible">
        <slot />
    </div>
</template>

<script setup>
    import { computed } from 'vue'

    const props = defineProps({
        inView: Boolean,
    })

    const visible = computed(() => {
        return props.inView ? 'visible' : ''
    })

</script>
