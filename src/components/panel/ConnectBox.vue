<template>
    <div class="connect-box" :style="styles" :id="node.handle" >
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
<style>
    .connect-box {
        position: absolute;
        padding: 12px;
        background-color: white;
        border: 1px solid var(--color-border);
        border-radius: 4px;
        min-width: 192px;
        min-height: 64px;
        user-select: none;
    }
    .connect-box:hover {
        border: 1px solid var(--color-hover);
        cursor: grab;
    }
</style>
