<template>
    <div class="connect-grid" >
        <svg id="connect" v-html="wires" />
        <slot />
    </div>
</template>

<script>
export default {
    computed:{
        wires() {
            return this.$store.getters['canvas/getWires']
        },
    },
}
</script>

<style>
    .connect-grid {
        display: flex;
        width: 100%;
        min-height: calc(100vh - 120px);
        background-color: #ffe;
    }

    .connect-grid svg {
        width: 100%;
        min-height: calc(100vh - 120px);
    }
    .connect-grid svg .line {
        stroke: #777;
        stroke-width: 1;
        fill: transparent;
    }


</style>
