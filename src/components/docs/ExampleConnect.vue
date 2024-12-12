<template>
    <div class="scroll-content">
        <connect-grid>
            <connect-wires :nodes="nodes" />
            <template v-for="node in nodes">
                <connect-box :node="node" />
            </template>
        </connect-grid>
    </div>
</template>

<script>
export default {

    data() {
        return {
            nodes: [
                { handle: 'box-1', label: 'box 1',  x:  20, y: 110, out: 'box-2' },
                { handle: 'box-2', label: 'box 2',  x: 300, y: 110, out: 'box-3' },
                { handle: 'box-3', label: 'box 3',  x: 150, y: 260  },
            ]
        }
    }

}
</script>
