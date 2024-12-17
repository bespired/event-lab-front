<template>
    <div class="connect-box"
            :style="styles"
            :id="node.handle"
            @mouseover ="hover(true)"
            @mouseleave="hover(false)"
        >
        <div class="isSelected" v-if="isSelected"/>
        {{ node.label }}
    </div>
</template>
<script>
export default {
    props: {
        node: { type: Object, default: null },
    },
    computed: {
        styles()     { return { left: `${this.node.x}px`, top: `${this.node.y}px` } },
        selected()   { return this.$store.getters['canvas/selected']    },
        isSelected() { return this.selected.indexOf(this.node.handle) !== -1 },
    },

    methods: {
        toggleSelect() {
            if (this.isSelected)  this.$store.commit('canvas/delSelected', this.node.handle)
            if (!this.isSelected) this.$store.commit('canvas/addSelected', this.node.handle)
        },
        hover(setter) {
            if (window.pointer.down) return
            this.$store.commit('canvas/hoovered', setter ? this.node : null)
        }
    },

}
</script>
<style>
    .isSelected {
        border: 2px solid var(--color-hover);
        position: absolute;
        width: calc(8px + 100%);
        height:calc(8px + 100%);
        left: -4px;
        top: -4px;
        border-radius: 6px;
    }
</style>
