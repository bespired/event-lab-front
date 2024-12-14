<template>
    <div class="connect-box"
        :style="styles"
        :id="node.handle"
        @click=""
        >
        <div class="isSelected" />
        {{ node.label}}
    </div>
</template>
<script>
export default {
    props: {
        node: { type: Object, default: null },
    },
    computed: {
        styles() {
            return { left: `${this.node.x}px`, top: `${this.node.y}px` }
        }
    }
}
</script>
