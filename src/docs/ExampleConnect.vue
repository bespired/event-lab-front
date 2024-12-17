<template>
    <div class="scroll-content">
        <connect-grid>
            <connect-wires :nodes="nodes" :key="redraw" />
            <template v-for="node in nodes">
                <connect-box :node="node" />
            </template>
        </connect-grid>
    </div>
</template>

<script>
export default {

    beforeMount() {
        let nodes =
        [
            { handle: 'box-1', label: 'box 1',  x:  20, y: 110, out: 'box-2' },
            { handle: 'box-2', label: 'box 2',  x: 300, y: 110, out: 'box-3' },
            { handle: 'box-3', label: 'box 3',  x:  20, y: 260  },
            { handle: 'box-4', label: 'box 4',  x: 450, y: 200, out: 'box-3'  },
            { handle: 'box-5', label: 'box 5',  x: 150, y: 360, out: 'box-3'  },
            { handle: 'box-6', label: 'box 6',  x: 650, y: 560, out: 'box-8'  },
            { handle: 'box-7', label: 'box 7',  x: 850, y: 260, out: 'box-4'  },
            { handle: 'box-8', label: 'box 8',  x: 550, y: 400, out: 'box-7'  },
        ]

        this.$store.commit('canvas/setBoxes', nodes)
        this.$store.commit('canvas/boxMove', true)

    },

    beforeUnmount() {
        this.$store.commit('canvas/boxMove', false)
        this.$store.commit('canvas/setBoxes', null)
    },

    computed: {
        nodes()   { return this.$store.getters['canvas/getBoxes']   },
        update()  { return this.$store.getters['canvas/ptrMoved']   },
        redraw()  { return this.$store.getters['canvas/wireRedraw'] },
    }

}
</script>
