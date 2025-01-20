<template>
    <div class="debug-info" :data-update="update">
        <div>{{ pointer.down  }}: {{ pointer.moved }}</div>
        <div>{{ pointer.tick  }}: {{ pointer.done  }}</div>
        <div>{{ pointer.pageX }}, {{ pointer.pageY }}</div>
        <div>{{ pointer.distX }}, {{ pointer.distY }}</div>
        <div>{{ grabModus }}</div>
    </div>

</template>

<script>

export default {
    computed:{
        update()    { return this.$store.getters['canvas/ptrMoved']  },
        pointer()   { return window.pointer },
        grabModus() { return this.$store.getters['canvas/grabModus'] },
    },
}
</script>

<style>

    .debug-info {
        font-family: monospace;
        position: absolute;
        top: 100px; right: 0;
        background-color: white;
        color: black;
        padding: 8px;
    }

</style>
